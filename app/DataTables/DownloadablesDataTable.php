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
                return $query['location']['name'];
            })
            ->editColumn('uploaded_at', function ($query) {
                return Carbon::parse($query['created_at'])->format('m/d/Y');
            })
            ->editColumn('monthYear', function ($query) {
                return $query['timeframe'];
            })
            ->setRowId('id');
    }

    public function query(Downloadables $model): QueryBuilder
    {
        return $model->with('media')->newQuery();
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
            Column::make('location'),
            Column::make('category'),
            Column::make('monthYear'),
            Column::make('description'),
            Column::make('uploaded_at'),
        ];
    }

    protected function getActionColumns($id, $category, $timeframe, $mediaCount)
    {
        if ($mediaCount > 0) {
            $downloadAttachmentsURL = route('downloads', [$id, $category, $timeframe]);
            $viewPDF = route('downloads.view.pdf', [$id, $category, $timeframe]);

            return '
                <div class="col"><a href="'. $viewPDF .'" class="btn btn-primary btn-sm"><i class="fas fa-search"></i> View</a></div>
                <div class="col"><a href="'. $downloadAttachmentsURL .'" class="btn btn-success btn-sm"><i class="fas fa-download"></i> Download</a></div>
                ';
        }

    }

    protected function filename(): string
    {
        return 'Downloadables_' . date('YmdHis');
    }
}
