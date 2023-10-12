<?php

namespace App\DataTables;

use App\Models\Artikel;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class ArtikelDataTable extends DataTable
{

    protected array $actions = [ ];
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query)
    {
        return (new EloquentDataTable($query))
            ->addColumn( 'action', function( $data ){ // $data is data od current row in table
                return '<a href="#">'.$data->id.'</a>'; // or simply return html here
            })
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Artikel $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('artikel-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->parameters([
                        'buttons' => [],
                    ])
                    ->orderBy(1);
                    // ->selectStyleSingle();
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('id'),
            Column::make('judul_artikel'),
            Column::make('slug'),

        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Artikel_' . date('YmdHis');
    }
}
