<?php

namespace App\DataTables;

use App\Models\CaseDetail;
use Form;
use Yajra\Datatables\Services\DataTable;

class CaseDetailDataTable extends DataTable
{

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query())
            ->addColumn('action', 'case_details.datatables_actions')
            ->make(true);
    }

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $caseDetails = CaseDetail::query();

        return $this->applyScopes($caseDetails);
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
            'Kase_id' => ['name' => 'Kase_id', 'data' => 'Kase_id'],
            'foto_ktp' => ['name' => 'foto_ktp', 'data' => 'foto_ktp'],
            'foto_stnk' => ['name' => 'foto_stnk', 'data' => 'foto_stnk'],
            'foto_mobil' => ['name' => 'foto_mobil', 'data' => 'foto_mobil'],
            'sisi1' => ['name' => 'sisi1', 'data' => 'sisi1'],
            'sisi2' => ['name' => 'sisi2', 'data' => 'sisi2'],
            'sisi3' => ['name' => 'sisi3', 'data' => 'sisi3'],
            'sisi4' => ['name' => 'sisi4', 'data' => 'sisi4'],
            'foto_dashboard' => ['name' => 'foto_dashboard', 'data' => 'foto_dashboard'],
            'foto_sim' => ['name' => 'foto_sim', 'data' => 'foto_sim']
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'caseDetails';
    }
}
