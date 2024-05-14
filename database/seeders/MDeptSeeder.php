<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MDeptSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('m_dept')->insert(
            [
                [
                    'dept' => '1000', 'dept_name' => 'Supporting Divisions',
                    'status' => '1',
                    'created_at' => '2022-09-12 00:00:00',
                    'created_by' => '200613',
                    'updated_at' => '2022-09-12 00:00:00',
                    'updated_by' => '200613'
                ],
                [
                    'dept' => '1100', 'dept_name' => 'Management Office',
                    'status' => '1',
                    'created_at' => '2022-09-12 00:00:00',
                    'created_by' => '200613',
                    'updated_at' => '2022-09-12 00:00:00',
                    'updated_by' => '200613'
                ],
                [
                    'dept' => '1200', 'dept_name' => 'Internal Audit',
                    'status' => '1',
                    'created_at' => '2022-09-12 00:00:00',
                    'created_by' => '200613',
                    'updated_at' => '2022-09-12 00:00:00',
                    'updated_by' => '200613'
                ],
                [
                    'dept' => '1300', 'dept_name' => 'Information Technology',
                    'status' => '1',
                    'created_at' => '2022-09-12 00:00:00',
                    'created_by' => '200613',
                    'updated_at' => '2022-09-12 00:00:00',
                    'updated_by' => '200613'
                ],
                [
                    'dept' => '1310', 'dept_name' => 'Infrastructure & Tech. Support',
                    'status' => '1',
                    'created_at' => '2022-09-12 00:00:00',
                    'created_by' => '200613',
                    'updated_at' => '2022-09-12 00:00:00',
                    'updated_by' => '200613'
                ],
                [
                    'dept' => '1320', 'dept_name' => 'Application Development',
                    'status' => '1',
                    'created_at' => '2022-09-12 00:00:00',
                    'created_by' => '200613',
                    'updated_at' => '2022-09-12 00:00:00',
                    'updated_by' => '200613'
                ],
                [
                    'dept' => '2000', 'dept_name' => 'Marketing Divisions',
                    'status' => '1',
                    'created_at' => '2022-09-12 00:00:00',
                    'created_by' => '200613',
                    'updated_at' => '2022-09-12 00:00:00',
                    'updated_by' => '200613'
                ],
                [
                    'dept' => '2100', 'dept_name' => 'Brand Activation',
                    'status' => '1',
                    'created_at' => '2022-09-12 00:00:00',
                    'created_by' => '200613',
                    'updated_at' => '2022-09-12 00:00:00',
                    'updated_by' => '200613'
                ],
                [
                    'dept' => '2200', 'dept_name' => 'Digital Marketing',
                    'status' => '1',
                    'created_at' => '2022-09-12 00:00:00',
                    'created_by' => '200613',
                    'updated_at' => '2022-09-12 00:00:00',
                    'updated_by' => '200613'
                ],
                [
                    'dept' => '2300', 'dept_name' => 'Product Marketing',
                    'status' => '1',
                    'created_at' => '2022-09-12 00:00:00',
                    'created_by' => '200613',
                    'updated_at' => '2022-09-12 00:00:00',
                    'updated_by' => '200613'
                ],
                [
                    'dept' => '3000', 'dept_name' => 'Sales Divisions',
                    'status' => '1',
                    'created_at' => '2022-09-12 00:00:00',
                    'created_by' => '200613',
                    'updated_at' => '2022-09-12 00:00:00',
                    'updated_by' => '200613'
                ],
                [
                    'dept' => '3100', 'dept_name' => 'General Trade',
                    'status' => '1',
                    'created_at' => '2022-09-12 00:00:00',
                    'created_by' => '200613',
                    'updated_at' => '2022-09-12 00:00:00',
                    'updated_by' => '200613'
                ],
                [
                    'dept' => '3200', 'dept_name' => 'Modern Trade',
                    'status' => '1',
                    'created_at' => '2022-09-12 00:00:00',
                    'created_by' => '200613',
                    'updated_at' => '2022-09-12 00:00:00',
                    'updated_by' => '200613'
                ],
                [
                    'dept' => '3300', 'dept_name' => 'HoReCa',
                    'status' => '1',
                    'created_at' => '2022-09-12 00:00:00',
                    'created_by' => '200613',
                    'updated_at' => '2022-09-12 00:00:00',
                    'updated_by' => '200613'
                ],
                [
                    'dept' => '3400', 'dept_name' => 'Commercial Sales',
                    'status' => '1',
                    'created_at' => '2022-09-12 00:00:00',
                    'created_by' => '200613',
                    'updated_at' => '2022-09-12 00:00:00',
                    'updated_by' => '200613'
                ],
                [
                    'dept' => '3500', 'dept_name' => 'Sales Support',
                    'status' => '1',
                    'created_at' => '2022-09-12 00:00:00',
                    'created_by' => '200613',
                    'updated_at' => '2022-09-12 00:00:00',
                    'updated_by' => '200613'
                ],
                [
                    'dept' => '4000', 'dept_name' => 'Finance, Accounting & Tax',
                    'status' => '1',
                    'created_at' => '2022-09-12 00:00:00',
                    'created_by' => '200613',
                    'updated_at' => '2022-09-12 00:00:00',
                    'updated_by' => '200613'
                ],
                [
                    'dept' => '4100', 'dept_name' => 'Finance',
                    'status' => '1',
                    'created_at' => '2022-09-12 00:00:00',
                    'created_by' => '200613',
                    'updated_at' => '2022-09-12 00:00:00',
                    'updated_by' => '200613'
                ],
                [
                    'dept' => '4110', 'dept_name' => 'Account Receivable',
                    'status' => '1',
                    'created_at' => '2022-09-12 00:00:00',
                    'created_by' => '200613',
                    'updated_at' => '2022-09-12 00:00:00',
                    'updated_by' => '200613'
                ],
                [
                    'dept' => '4120', 'dept_name' => 'Account Payable',
                    'status' => '1',
                    'created_at' => '2022-09-12 00:00:00',
                    'created_by' => '200613',
                    'updated_at' => '2022-09-12 00:00:00',
                    'updated_by' => '200613'
                ],
                [
                    'dept' => '4200', 'dept_name' => 'Accounting & Tax',
                    'status' => '1',
                    'created_at' => '2022-09-12 00:00:00',
                    'created_by' => '200613',
                    'updated_at' => '2022-09-12 00:00:00',
                    'updated_by' => '200613'
                ],
                [
                    'dept' => '4210', 'dept_name' => 'Accounting',
                    'status' => '1',
                    'created_at' => '2022-09-12 00:00:00',
                    'created_by' => '200613',
                    'updated_at' => '2022-09-12 00:00:00',
                    'updated_by' => '200613'
                ],
                [
                    'dept' => '4220', 'dept_name' => 'Tax',
                    'status' => '1',
                    'created_at' => '2022-09-12 00:00:00',
                    'created_by' => '200613',
                    'updated_at' => '2022-09-12 00:00:00',
                    'updated_by' => '200613'
                ],
                [
                    'dept' => '4300', 'dept_name' => 'Exim & Operational',
                    'status' => '1',
                    'created_at' => '2022-09-12 00:00:00',
                    'created_by' => '200613',
                    'updated_at' => '2022-09-12 00:00:00',
                    'updated_by' => '200613'
                ],
                [
                    'dept' => '4400', 'dept_name' => 'Purchasing',
                    'status' => '1',
                    'created_at' => '2022-09-12 00:00:00',
                    'created_by' => '200613',
                    'updated_at' => '2022-09-12 00:00:00',
                    'updated_by' => '200613'
                ],
                [
                    'dept' => '5000', 'dept_name' => 'Human Resource & General Affair',
                    'status' => '1',
                    'created_at' => '2022-09-12 00:00:00',
                    'created_by' => '200613',
                    'updated_at' => '2022-09-12 00:00:00',
                    'updated_by' => '200613'
                ],
                [
                    'dept' => '5100', 'dept_name' => 'Human Resource',
                    'status' => '1',
                    'created_at' => '2022-09-12 00:00:00',
                    'created_by' => '200613',
                    'updated_at' => '2022-09-12 00:00:00',
                    'updated_by' => '200613'
                ],
                [
                    'dept' => '5200', 'dept_name' => 'General Affair',
                    'status' => '1',
                    'created_at' => '2022-09-12 00:00:00',
                    'created_by' => '200613',
                    'updated_at' => '2022-09-12 00:00:00',
                    'updated_by' => '200613'
                ],
                [
                    'dept' => '6000', 'dept_name' => 'Manufacturing Divisions',
                    'status' => '1',
                    'created_at' => '2022-09-12 00:00:00',
                    'created_by' => '200613',
                    'updated_at' => '2022-09-12 00:00:00',
                    'updated_by' => '200613'
                ],
                [
                    'dept' => '6100', 'dept_name' => 'PPIC',
                    'status' => '1',
                    'created_at' => '2022-09-12 00:00:00',
                    'created_by' => '200613',
                    'updated_at' => '2022-09-12 00:00:00',
                    'updated_by' => '200613'
                ],
                [
                    'dept' => '6200', 'dept_name' => 'R & D',
                    'status' => '1',
                    'created_at' => '2022-09-12 00:00:00',
                    'created_by' => '200613',
                    'updated_at' => '2022-09-12 00:00:00',
                    'updated_by' => '200613'
                ],
                [
                    'dept' => '6300', 'dept_name' => 'Production',
                    'status' => '1',
                    'created_at' => '2022-09-12 00:00:00',
                    'created_by' => '200613',
                    'updated_at' => '2022-09-12 00:00:00',
                    'updated_by' => '200613'
                ],
                [
                    'dept' => '6400', 'dept_name' => 'QA-QC',
                    'status' => '1',
                    'created_at' => '2022-09-12 00:00:00',
                    'created_by' => '200613',
                    'updated_at' => '2022-09-12 00:00:00',
                    'updated_by' => '200613'
                ],
                [
                    'dept' => '6500', 'dept_name' => 'Engineering',
                    'status' => '1',
                    'created_at' => '2022-09-12 00:00:00',
                    'created_by' => '200613',
                    'updated_at' => '2022-09-12 00:00:00',
                    'updated_by' => '200613'
                ],
                [
                    'dept' => '7000', 'dept_name' => 'Supply Chain Divisions',
                    'status' => '1',
                    'created_at' => '2022-09-12 00:00:00',
                    'created_by' => '200613',
                    'updated_at' => '2022-09-12 00:00:00',
                    'updated_by' => '200613'
                ],
                [
                    'dept' => '7100', 'dept_name' => 'Warehouse',
                    'status' => '1',
                    'created_at' => '2022-09-12 00:00:00',
                    'created_by' => '200613',
                    'updated_at' => '2022-09-12 00:00:00',
                    'updated_by' => '200613'
                ],
                [
                    'dept' => '7200', 'dept_name' => 'Logistic',
                    'status' => '1',
                    'created_at' => '2022-09-12 00:00:00',
                    'created_by' => '200613',
                    'updated_at' => '2022-09-12 00:00:00',
                    'updated_by' => '200613'
                ],
            ]
        );
    }
}
