<?php

namespace App\DataTables;

use App\Models\PredictedHiLow;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class PredictedHiLowsDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     * @return \Yajra\DataTables\EloquentDataTable
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        $query = PredictedHiLow::with('location');

        return (new EloquentDataTable($query))
//            ->addColumn('action', function ($query) {
//                return $this->getActionColumns($query['id']);
//            })
            ->addColumn('locations', function ($query) {
                return $query['location']['name'];
            })
            ->editColumn('uploaded_on', function ($query) {
                return Carbon::parse($query['created_at'])->format('m/d/Y');
            })
            ->setRowId('id');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\PredictedHiLow $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(PredictedHiLow $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('predictedhilows-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->dom('Bfrtip')
                    ->orderBy(1)
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

    /**
     * Get the dataTable columns definition.
     *
     * @return array
     */
    public function getColumns(): array
    {
        return [
//            Column::computed('action')
//                  ->exportable(false)
//                  ->printable(false)
//                  ->width(60)
//                  ->addClass('text-center'),
//            Column::make('action'),
            Column::make('id'),
            Column::make('date'),
            Column::make('hour'),
            Column::make('tide'),
            Column::make('locations', 'location.name'),
            Column::make('uploaded_on')->searchable(false),
        ];
    }

    protected function getActionColumns($id)
    {
            $editRoute = route('predicted_hi_lows.edit', [$id]);
            $deleteRoute = route('predicted_hi_lows.destroy', [$id]);

            $editBtn = '<a href="' .$editRoute. '" class="btn btn-secondary me-1"> Edit</a>';
            $deleteBtn = '<form action="' .$deleteRoute.'" method="POST">
                            '.csrf_field().'
                            '.method_field('DELETE').'
                            <button type="submit" class="btn btn-danger"> Delete</button>
                            </form>';

            return '<div class="d-flex flex-row">'.
               $editBtn . $deleteBtn
                .'</div>';
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'PredictedHiLows_' . date('YmdHis');
    }
}
