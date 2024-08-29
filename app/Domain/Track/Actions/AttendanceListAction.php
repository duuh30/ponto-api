<?php

namespace App\Domain\Track\Actions;

use App\Domain\User\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class AttendanceListAction
{
    public function execute(User $manager, array $filters = []): Collection
    {
       $startDate = data_get($filters, 'start_date', now()->subDay()->format('Y-m-d'));
       $endDate = data_get($filters, 'end_date', now()->format('Y-m-d'));

        $attendances = DB::select("
            SELECT att.id,
            att.clock_in AS 'Entrada 1',
            att.lunch_out AS 'Saida 1',
            att.lunch_in  AS 'Entrada 2',
            att.clock_out  AS 'Saida 2',
            u.name AS Nome,
            CASE
                WHEN u.role_id = 1 THEN 'Gerente'
                ELSE 'Funcionário'
            END AS 'Cargo',
            m.name AS 'Nome do Gestor',
            att.created_at
            FROM attendances att
            INNER JOIN users u ON u.id = att.user_id
            INNER JOIN users m ON m.id = u.manager_id
            WHERE m.id = ? AND DATE(att.created_at) >= ? AND DATE(att.created_at) <= ?
        ", [$manager->id, $startDate, $endDate]);

        return collect($attendances);
    }
}
