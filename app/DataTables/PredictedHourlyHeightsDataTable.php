<?php

namespace App\DataTables;

use App\Models\PredictedHourlyHeights;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class PredictedHourlyHeightsDataTable extends DataTable
{

    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        $query = PredictedHourlyHeights::with('location');

        return (new EloquentDataTable($query))
            ->addColumn('action', 'predictedhourlyheights.action')
            ->editColumn('location', function ($query) {
                return $query['location']['name'];
            })
            ->editColumn('uploaded_on', function ($query) {
                return Carbon::parse($query['created_at'])->format('m/d/Y');
            })
            ->setRowId('id');
    }

    public function query(PredictedHourlyHeights $model): QueryBuilder
    {
        return $model->newQuery();
    }

    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('predictedhourlyheights-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
//                    ->dom('Bfrtip')
                    ->orderBy(0,'asc')
                    ->selectStyleSingle()
                    ->lengthMenu([50, 100, 500, 1000])
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
//            Column::computed('action')
//                  ->exportable(false)
//                  ->printable(false)
//                  ->width(60)
//                  ->addClass('text-center'),
            Column::make('id'),
            Column::make('date'),
            Column::make('hour'),
            Column::make('location', 'location.name'),
            Column::make('uploaded_on')->searchable(false),
        ];
    }

    protected function filename(): string
    {
        return 'PredictedHourlyHeights_' . date('YmdHis');
    }
}
