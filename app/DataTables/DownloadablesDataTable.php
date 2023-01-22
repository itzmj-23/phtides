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
                $mediaItems = $query->getMedia('downloads');

                return $this->getActionColumns($query['id'], $mediaItems->count());

            })
            ->editColumn('location', function ($query) {
                return $query['location']['name'];
            })
            ->editColumn('uploaded_at', function ($query) {
                return Carbon::parse($query['created_at'])->format('m/d/Y');
            })
            ->setRowId('id');
    }

    public function query(Downloadables $model): QueryBuilder
    {
        return $model->newQuery();
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
            Column::make('name'),
            Column::make('description'),
            Column::make('uploaded_at'),
        ];
    }

    protected function getActionColumns($id, $mediaCount)
    {
        if ($mediaCount > 0) {
            $downloadAttachmentsURL = route('downloads.resources', $id);

            return '<form method="GET" action="' . $downloadAttachmentsURL . '">
                <input type="hidden" name="_token" value="' . @csrf_token() . '" />
                <button type="submit" class="btn btn-success btn-sm">
                <i class="fas fa-download"></i> Download</button>
                </form>
                ';
        }

    }

    protected function filename(): string
    {
        return 'Downloadables_' . date('YmdHis');
    }
}
