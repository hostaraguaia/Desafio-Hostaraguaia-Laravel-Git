<?php

namespace Modules\Permission\Database\Seeders;

use Modules\Permission\Enum\PermissionItemTypeEnum;
use Modules\Permission\Repositories\PermissionItemRepository;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class PermissionItemTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::disableQueryLog();

        $items = [
            //General Basic Itemss
            [
                'name' => "Permission for Accessing the Resource User",
                'code' => "user",
                'type' => PermissionItemTypeEnum::ITEM,
                'icon' => NULL,
                'icon_type' => NULL
            ],
            [
                'name' => "Permission for Accessing other Users",
                'code' => "users",
                'type' => PermissionItemTypeEnum::ROUTE,
                'icon' => NULL,
                'icon_type' => NULL
            ],
            [
                'name' => "Permission for Token Information in the Resource Authentication",
                'code' => "user.information",
                'type' => PermissionItemTypeEnum::ROUTE,
                'icon' => NULL,
                'icon_type' => NULL
            ],
            [
                'name' => "Permission for Token Permissions in the Resource Authentication",
                'code' => "user.permission",
                'type' => PermissionItemTypeEnum::ROUTE,
                'icon' => NULL,
                'icon_type' => NULL
            ],
            [
                'name' => "Permission for Listing and Searching in the Resource User",
                'code' => "user.show",
                'type' => PermissionItemTypeEnum::ROUTE,
                'icon' => NULL,
                'icon_type' => NULL
            ],
            [
                'name' => "Permission for Listing, Searching and Exporting in datatable format on the Resource User",
                'code' => "user.index",
                'type' => PermissionItemTypeEnum::ROUTE,
                'icon' => NULL,
                'icon_type' => NULL
            ],
            [
                'name' => "Permission for Creating in the Resource User",
                'code' => "user.store",
                'type' => PermissionItemTypeEnum::ROUTE,
                'icon' => NULL,
                'icon_type' => NULL
            ],
            [
                'name' => "Permission for Editing in the Resource User",
                'code' => "user.update",
                'type' => PermissionItemTypeEnum::ROUTE,
                'icon' => NULL,
                'icon_type' => NULL
            ],
            [
                'name' => "Permission for Deleting in the Resource User",
                'code' => "user.destroy",
                'type' => PermissionItemTypeEnum::ROUTE,
                'icon' => NULL,
                'icon_type' => NULL
            ],
            [
                'name' => "Permission for Recovering in the Resource User",
                'code' => "user.recover",
                'type' => PermissionItemTypeEnum::ROUTE,
                'icon' => NULL,
                'icon_type' => NULL
            ],
            [
                'name' => "Permission for Auditing in the Resource User",
                'code' => "user.audit",
                'type' => PermissionItemTypeEnum::ROUTE,
                'icon' => NULL,
                'icon_type' => NULL
            ],
            [
                'name' => "Permission for Blocking in the Resource User",
                'code' => "user.block",
                'type' => PermissionItemTypeEnum::ROUTE,
                'icon' => NULL,
                'icon_type' => NULL
            ],
            [
                'name' => "Permission for Unblocking in the Resource User",
                'code' => "user.unblock",
                'type' => PermissionItemTypeEnum::ROUTE,
                'icon' => NULL,
                'icon_type' => NULL
            ],
            [
                'name' => "Permission for Inactivate in the Resource User",
                'code' => "user.inactivate",
                'type' => PermissionItemTypeEnum::ROUTE,
                'icon' => NULL,
                'icon_type' => NULL
            ],
            [
                'name' => "Permission for Activate in the Resource User",
                'code' => "user.activate",
                'type' => PermissionItemTypeEnum::ROUTE,
                'icon' => NULL,
                'icon_type' => NULL
            ],
            [
                'name' => "Permission for Accessing the Resource Client",
                'code' => "client",
                'type' => PermissionItemTypeEnum::ITEM,
                'icon' => NULL,
                'icon_type' => NULL
            ],
            [
                'name' => "Permission for Auditing Resources",
                'code' => "audit",
                'type' => PermissionItemTypeEnum::ITEM,
                'icon' => NULL,
                'icon_type' => NULL
            ],
            [
                'name' => "Permission for Recover Deleted Registers",
                'code' => "status.recover",
                'type' => PermissionItemTypeEnum::ITEM,
                'icon' => NULL,
                'icon_type' => NULL
            ],
            [
                'name' => "Permission for Delete Registers",
                'code' => "status.delete",
                'type' => PermissionItemTypeEnum::ITEM,
                'icon' => NULL,
                'icon_type' => NULL
            ],
            [
                'name' => "Permission for Accessing Deleted Registers",
                'code' => "status.deleted.view",
                'type' => PermissionItemTypeEnum::ITEM,
                'icon' => NULL,
                'icon_type' => NULL
            ],
            [
                'name' => "Permission for Updating Deleted Registers",
                'code' => "status.deleted.update",
                'type' => PermissionItemTypeEnum::ITEM,
                'icon' => NULL,
                'icon_type' => NULL
            ],
            [
                'name' => "Permission for Activate Inactivated Registers",
                'code' => "status.activate",
                'type' => PermissionItemTypeEnum::ITEM,
                'icon' => NULL,
                'icon_type' => NULL
            ],
            [
                'name' => "Permission for Inactivate Registers",
                'code' => "status.inactive",
                'type' => PermissionItemTypeEnum::ITEM,
                'icon' => NULL,
                'icon_type' => NULL
            ],
            [
                'name' => "Permission for Accessing Inactivated Registers",
                'code' => "status.inactivated.view",
                'type' => PermissionItemTypeEnum::ITEM,
                'icon' => NULL,
                'icon_type' => NULL
            ],
            [
                'name' => "Permission for Updating Inactivated Registers",
                'code' => "status.inactivated.update",
                'type' => PermissionItemTypeEnum::ITEM,
                'icon' => NULL,
                'icon_type' => NULL
            ],
            [
                'name' => "Permission for Unblock Blocked Registers",
                'code' => "status.unblock",
                'type' => PermissionItemTypeEnum::ITEM,
                'icon' => NULL,
                'icon_type' => NULL
            ],
            [
                'name' => "Permission Block Registers",
                'code' => "status.block",
                'type' => PermissionItemTypeEnum::ITEM,
                'icon' => NULL,
                'icon_type' => NULL
            ],
            [
                'name' => "Permission for Accessing Blocked Registers",
                'code' => "status.blocked.view",
                'type' => PermissionItemTypeEnum::ITEM,
                'icon' => NULL,
                'icon_type' => NULL
            ],
            [
                'name' => "Permission for Updating Blocked Registers",
                'code' => "status.blocked.update",
                'type' => PermissionItemTypeEnum::ITEM,
                'icon' => NULL,
                'icon_type' => NULL
            ],

            //Authentication 
            [
                'name' => "Permission for Accessing the Resource Authentication",
                'code' => "auth",
                'type' => PermissionItemTypeEnum::ITEM,
                'icon' => NULL,
                'icon_type' => NULL
            ],
            [
                'name' => "Permission for Login in the Resource Authentication",
                'code' => "auth.login",
                'type' => PermissionItemTypeEnum::ROUTE,
                'icon' => NULL,
                'icon_type' => NULL
            ],
            [
                'name' => "Permission for Logout in the Resource Authentication",
                'code' => "auth.logout",
                'type' => PermissionItemTypeEnum::ROUTE,
                'icon' => NULL,
                'icon_type' => NULL
            ],

            //Permission Group
            [
                'name' => "Permission for Accessing the Resource Permission Group",
                'code' => "permission.group",
                'type' => PermissionItemTypeEnum::ITEM,
                'icon' => NULL,
                'icon_type' => NULL
            ],
            [
                'name' => "Permission for Listing and Searching in the Resource Permission Group",
                'code' => "permission.group.show",
                'type' => PermissionItemTypeEnum::ROUTE,
                'icon' => NULL,
                'icon_type' => NULL
            ],
            [
                'name' => "Permission for Listing, Searching and Exporting in table format on the Resource Permission Group",
                'code' => "permission.group.index",
                'type' => PermissionItemTypeEnum::ROUTE,
                'icon' => NULL,
                'icon_type' => NULL
            ],
            [
                'name' => "Permission for Creating in the Resource Permission Group",
                'code' => "permission.group.store",
                'type' => PermissionItemTypeEnum::ROUTE,
                'icon' => NULL,
                'icon_type' => NULL
            ],
            [
                'name' => "Permission for Editing in the Resource Permission Group",
                'code' => "permission.group.update",
                'type' => PermissionItemTypeEnum::ROUTE,
                'icon' => NULL,
                'icon_type' => NULL
            ],
            [
                'name' => "Permission for Deleting in the Resource Permission Group",
                'code' => "permission.group.destroy",
                'type' => PermissionItemTypeEnum::ROUTE,
                'icon' => NULL,
                'icon_type' => NULL
            ],
            [
                'name' => "Permission for Recovering in the Resource Permission Group",
                'code' => "permission.group.recover",
                'type' => PermissionItemTypeEnum::ROUTE,
                'icon' => NULL,
                'icon_type' => NULL
            ],

            //Permission Item
            [
                'name' => "Permission for Accessing the Resource Permission Item",
                'code' => "permission.item",
                'type' => PermissionItemTypeEnum::ITEM,
                'icon' => NULL,
                'icon_type' => NULL
            ],
            [
                'name' => "Permission for Listing and Searching in the Resource Permission Item",
                'code' => "permission.item.show",
                'type' => PermissionItemTypeEnum::ROUTE,
                'icon' => NULL,
                'icon_type' => NULL
            ],
            [
                'name' => "Permission for Listing, Searching and Exporting in table format on the Resource Permission Item",
                'code' => "permission.item.index",
                'type' => PermissionItemTypeEnum::ROUTE,
                'icon' => NULL,
                'icon_type' => NULL
            ],
            [
                'name' => "Permission for Creating in the Resource Permission Item",
                'code' => "permission.item.store",
                'type' => PermissionItemTypeEnum::ROUTE,
                'icon' => NULL,
                'icon_type' => NULL
            ],
            [
                'name' => "Permission for Editing in the Resource Permission Item",
                'code' => "permission.item.update",
                'type' => PermissionItemTypeEnum::ROUTE,
                'icon' => NULL,
                'icon_type' => NULL
            ],
            [
                'name' => "Permission for Deleting in the Resource Permission Item",
                'code' => "permission.item.destroy",
                'type' => PermissionItemTypeEnum::ROUTE,
                'icon' => NULL,
                'icon_type' => NULL
            ],
            [
                'name' => "Permission for Recovering in the Resource Permission Item",
                'code' => "permission.item.recover",
                'type' => PermissionItemTypeEnum::ROUTE,
                'icon' => NULL,
                'icon_type' => NULL
            ],

            //Permission Map
            [
                'name' => "Permission for Accessing the Resource Permission Map",
                'code' => "permission.map",
                'type' => PermissionItemTypeEnum::ITEM,
                'icon' => NULL,
                'icon_type' => NULL
            ],
            [
                'name' => "Permission for Listing and Searching in the Resource Permission Map",
                'code' => "permission.map.show",
                'type' => PermissionItemTypeEnum::ROUTE,
                'icon' => NULL,
                'icon_type' => NULL
            ],
            [
                'name' => "Permission for Listing, Searching and Exporting in table format on the Resource Permission Map",
                'code' => "permission.map.index",
                'type' => PermissionItemTypeEnum::ROUTE,
                'icon' => NULL,
                'icon_type' => NULL
            ],
            [
                'name' => "Permission for Creating in the Resource Permission Map",
                'code' => "permission.map.store",
                'type' => PermissionItemTypeEnum::ROUTE,
                'icon' => NULL,
                'icon_type' => NULL
            ],
            [
                'name' => "Permission for Editing in the Resource Permission Map",
                'code' => "permission.map.update",
                'type' => PermissionItemTypeEnum::ROUTE,
                'icon' => NULL,
                'icon_type' => NULL
            ],
            [
                'name' => "Permission for Deleting in the Resource Permission Map",
                'code' => "permission.map.destroy",
                'type' => PermissionItemTypeEnum::ROUTE,
                'icon' => NULL,
                'icon_type' => NULL
            ],
            [
                'name' => "Permission for Recovering in the Resource Permission Map",
                'code' => "permission.map.recover",
                'type' => PermissionItemTypeEnum::ROUTE,
                'icon' => NULL,
                'icon_type' => NULL
            ],
        ];

        Schema::disableForeignKeyConstraints();
        DB::table('permission_items')->truncate();
        $counter = 0;
        foreach ($items as $item) {
            $save = app(PermissionItemRepository::class)->create($item);
            if (is_string($save))
                throw new \Exception($save);

            if ($this->command)
                $this->command->info("Inserted Permission Item: {$item['name']} [$counter]");
            else
                echo ("Inserted Permission Item: {$item['name']} [$counter]\n");

            $counter += 1;
        }
        Schema::enableForeignKeyConstraints();
    }
}
