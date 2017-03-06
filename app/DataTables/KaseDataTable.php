<?php

namespace App\DataTables;

use App\Models\Kase;
use Form;
use Yajra\Datatables\Services\DataTable;

class KaseDataTable extends DataTable
{

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query())
            ->addColumn('action', 'kases.datatables_actions')
            ->make(true);
    }

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $kases = Kase::query();

        return $this->applyScopes($kases);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\Datatables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->addAction(['width' => '10%'])
            ->ajax('')
            ->parameters([
                'dom' => 'Bfrtip',
                'scrollX' => false,
                'buttons' => [
                    'print',
                    'reset',
                    'reload',
                    [
                         'extend'  => 'collection',
                         'text'    => '<i class="fa fa-download"></i> Export',
                         'buttons' => [
                             'csv',
                             'excel',
                             'pdf',
                         ],
                    ],
                    'colvis'
                ]
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    private function getColumns()
    {
        return [
            'tanggal_case' => ['name' => 'tanggal_case', 'data' => 'tanggal_case'],
            'no_polisi' => ['name' => 'no_polisi', 'data' => 'no_polisi'],
            'no_mesin' => ['name' => 'no_mesin', 'data' => 'no_mesin'],
            'no_rangka' => ['name' => 'no_rangka', 'data' => 'no_rangka'],
            'merek_id' => ['name' => 'merek_id', 'data' => 'merek_id'],
            'tahun_anggaran' => ['name' => 'tahun_anggaran', 'data' => 'tahun_anggaran'],
            'warna' => ['name' => 'warna', 'data' => 'warna'],
            'status' => ['name' => 'status', 'data' => 'status'],
            'agent_id' => ['name' => 'agent_id', 'data' => 'agent_id'],
            'wilayah_id' => ['name' => 'wilayah_id', 'data' => 'wilayah_id']
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'kases';
    }
}
