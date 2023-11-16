<?php

namespace App\DataTables;

use App\Models\Downloadables;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class DownloadablesDataTable extends DataTable
{

    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function ($query) {
                $mediaItems = $query->getMedia('primary-hourly-heights');

                $mediaItems = $query->getRegisteredMediaCollections();
//                $mediaItems += $query->getMedia('primary-hi-low');

                return $this->getActionColumns($query['id'], $query['category'], $query['timeframe'], $mediaItems->count());

            })
            ->editColumn('location', function ($query) {
                if (isset($query['location'])) {
                    return $query['location']['name'];
                }

                return 'All';
            })
            ->editColumn('uploaded_at', function ($query) {
                return Carbon::parse($query['created_at'])->format('m-d-Y');
            })
            // ->editColumn('monthYear', function ($query) {
            //     return $query['timeframe'];
            // })
            ->setRowId('id');
    }

    public function query(Downloadables $model): QueryBuilder
    {
        return $model->with(['media', 'location'])->newQuery();



    }

    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('downloadables-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->dom('Bfrtip')
                    ->orderBy(1)
                    ->selectStyleSingle()
                    ->buttons([
//                        Button::make('excel'),
//                        Button::make('csv'),
//                        Button::make('pdf'),
//                        Button::make('print'),
//                        Button::make('reset'),
//                        Button::make('reload')
                    ]);
    }

    public function getColumns(): array
    {
        return [
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(60)
                  ->addClass('text-center'),
            Column::make('id'),
            Column::make('location')->data('location')->name('location.name')->title('Location'),
            Column::make('category'),
            Column::make('timeframe')->title('Resources Title'),
            Column::make('description'),
            Column::make('uploaded_at')->name('created_at'),
        ];
    }

    protected function getActionColumns($id, $category, $timeframe, $mediaCount)
    {
        if ($mediaCount > 0) {
            $downloadAttachmentsURL = route('downloads', [$id, $category, $timeframe]);
            $viewPDF = route('downloads.view.pdf', [$id, $category, $timeframe]);
            $editRoute = route('downloads.edit', [$id]);
            $deleteRoute = route('downloads.destroy', [$id]);

            $viewBtn = '<a href="' .$viewPDF. '" class="btn btn-primary me-1" target="_blank" rel="noopener noreferrer"> View</a>';
            $editBtn = '<a href="' .$editRoute. '" class="btn btn-secondary me-1"> Edit</a>';
            $deleteBtn = '<form action="' .$deleteRoute.'" method="POST">
                            '.csrf_field().'
                            '.method_field('DELETE').'
                            <button type="submit" class="btn btn-danger"> Delete</button>
                            </form>';
            $downloadBtn = '<a href="'. $downloadAttachmentsURL .'" class="btn btn-success me-1">Download</a>';

            return '<div class="d-flex flex-row">'.
                $viewBtn . $downloadBtn . $editBtn . $deleteBtn
                .'</div>';
        }
    }

    protected function filename(): string
    {
        return 'Downloadables_' . date('YmdHis');
    }
}
