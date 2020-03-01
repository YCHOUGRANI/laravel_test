<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /** 
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $companyStatuses = [
            ['name' => 'Active'],
            ['name' => 'Lost'],
            ['name' => 'Suspended'],
            ['name' => 'Prospect'],
        ];

        foreach($companyStatuses as $status)
        {
            App\CompanyStatus::create($status);
        }

        $companyTypes = [
            ['name' => 'Distributor'],
            ['name' => 'Agent'],
            ['name' => 'Reseller'],
            ['name' => 'Supplier'],
        ];
        foreach($companyTypes as $companyType)
        {
            App\CompanyType::create($companyType);
        }

        $contactRoles = [
            ['name' => 'Director'],
            ['name' => 'Owner'],
            ['name' => 'Manager'],
            ['name' => 'Staff'],
        ];
        foreach($contactRoles as $role)
        {
            App\ContactRole::create($role);
        }


        factory(App\Company::class, 500)->create()->each(function ($c) {
            $c->contacts()->saveMany(factory(App\Contact::class, rand(1,5))->make());
        });

        
        $items = [
            ['name' => 'Dyson Light Ball Multifloor Upright Vacuum - Refurbished - 2 Year Guarantee'],
            ['name' => 'HP 658553-421 ProLiant N40L Micro Server - Black, 8Gb RAM,128Gb SSD'],
            ['name' => 'Supermicro CSE-829-9 server 6tb +500gb ssd win2016 server installed(licenced)'],
            ['name' => 'Audison bit Play HD 240GB SSD Car Multimedia Server Wi-Fi Audio Streaming'],
            ['name' => 'Dell R420 Rack Server 32Gb 2x E5 2407 2.4Ghz 4x 100Gb SSD'],
            ['name' => 'Dell PowerEdge R320 Rack Server Xeon E5-2430L 2x160GB SSD 16GB H310'],

        ];

	foreach($items as $it)
        {
            App\Item::create($it);
        }

       
    }
}
