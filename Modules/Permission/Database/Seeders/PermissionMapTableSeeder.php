<?php

namespace Modules\Permission\Database\Seeders;

use Modules\Permission\Entities\PermissionItem;
use Modules\Permission\Services\PermissionMapService;
use Modules\Permission\Repositories\PermissionRepository;
use Modules\Permission\Exceptions\PermissionItemNotFound;
use Modules\Permission\Exceptions\PermissionGroupNotFound;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class PermissionMapTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * 
     */
    public function run()
    {
        DB::disableQueryLog();
        $permisson_map = [
            [ 'Teste'                 ,'user'            ],
            [ 'Administrador'         ,'user'            ],
            [ 'Motorista'             ,'user'            ],
            [ 'Atendente'             ,'user'            ],
            [ 'Presidencia'           ,'user'            ],
            [ 'Desenvolvedor'         ,'user'            ],
            [ 'Logística'             ,'user'            ],
            [ 'Faturamento'           ,'user'            ],
            [ 'Gerente de Contas'     ,'user'            ],
            [ 'Financeiro'            ,'user'            ],
            [ 'Cliente'               ,'user'            ],
            [ 'Suporte'               ,'user'            ],
            [ 'Controle de Qualidade' ,'user'            ],
            [ 'Gerente operacional'   ,'user'            ],
            [ 'Gerente comercial'     ,'user'            ],
            [ 'Desenvolvedor'         ,'user'            ],
            [ 'DBA'                   ,'user'            ],
            [ 'Sistema'               ,'user'            ],
            [ 'Gerente de contratos'  ,'user'            ],
            [ 'Gerente de canais'     ,'user'            ],

            [ 'Teste'                 ,'user.index'      ],
            [ 'Teste'                 ,'user.show'       ],
            [ 'Teste'                 ,'user.store'      ],
            [ 'Teste'                 ,'user.update'     ],
            [ 'Teste'                 ,'user.destroy'    ],
            [ 'Teste'                 ,'user.recover'    ],
            [ 'Teste'                 ,'user.inactivate' ],
            [ 'Teste'                 ,'user.activate'   ],
            [ 'Teste'                 ,'user.block'      ],
            [ 'Teste'                 ,'user.unblock'    ],
            [ 'Teste'                 ,'user.audit'      ],

            [ 'Administrador'         ,'user.index'      ],
            [ 'Administrador'         ,'user.show'       ],
            [ 'Administrador'         ,'user.store'      ],
            [ 'Administrador'         ,'user.update'     ],
            [ 'Administrador'         ,'user.destroy'    ],
            [ 'Administrador'         ,'user.recover'    ],
            [ 'Administrador'         ,'user.inactivate' ],
            [ 'Administrador'         ,'user.activate'   ],
            [ 'Administrador'         ,'user.block'      ],
            [ 'Administrador'         ,'user.unblock'    ],
            [ 'Administrador'         ,'user.audit'      ],

            [ 'Motorista'             ,'user.index'      ],
            [ 'Motorista'             ,'user.show'       ],
            [ 'Motorista'             ,'user.store'      ],
            [ 'Motorista'             ,'user.update'     ],
            [ 'Motorista'             ,'user.destroy'    ],
            [ 'Motorista'             ,'user.recover'    ],
            [ 'Motorista'             ,'user.inactivate' ],
            [ 'Motorista'             ,'user.activate'   ],
            [ 'Motorista'             ,'user.block'      ],
            [ 'Motorista'             ,'user.unblock'    ],
            [ 'Motorista'             ,'user.audit'      ],

            [ 'Atendente'             ,'user.index'      ],
            [ 'Atendente'             ,'user.show'       ],
            [ 'Atendente'             ,'user.store'      ],
            [ 'Atendente'             ,'user.update'     ],
            [ 'Atendente'             ,'user.destroy'    ],
            [ 'Atendente'             ,'user.recover'    ],
            [ 'Atendente'             ,'user.inactivate' ],
            [ 'Atendente'             ,'user.activate'   ],
            [ 'Atendente'             ,'user.block'      ],
            [ 'Atendente'             ,'user.unblock'    ],
            [ 'Atendente'             ,'user.audit'      ],

            [ 'Presidencia'           ,'user.index'      ],
            [ 'Presidencia'           ,'user.show'       ],
            [ 'Presidencia'           ,'user.store'      ],
            [ 'Presidencia'           ,'user.update'     ],
            [ 'Presidencia'           ,'user.destroy'    ],
            [ 'Presidencia'           ,'user.recover'    ],
            [ 'Presidencia'           ,'user.inactivate' ],
            [ 'Presidencia'           ,'user.activate'   ],
            [ 'Presidencia'           ,'user.block'      ],
            [ 'Presidencia'           ,'user.unblock'    ],
            [ 'Presidencia'           ,'user.audit'      ],

            [ 'Desenvolvedor'         ,'user.index'      ],
            [ 'Desenvolvedor'         ,'user.show'       ],
            [ 'Desenvolvedor'         ,'user.store'      ],
            [ 'Desenvolvedor'         ,'user.update'     ],
            [ 'Desenvolvedor'         ,'user.destroy'    ],
            [ 'Desenvolvedor'         ,'user.recover'    ],
            [ 'Desenvolvedor'         ,'user.inactivate' ],
            [ 'Desenvolvedor'         ,'user.activate'   ],
            [ 'Desenvolvedor'         ,'user.block'      ],
            [ 'Desenvolvedor'         ,'user.unblock'    ],
            [ 'Desenvolvedor'         ,'user.audit'      ],

            [ 'Logística'             ,'user.index'      ],
            [ 'Logística'             ,'user.show'       ],
            [ 'Logística'             ,'user.store'      ],
            [ 'Logística'             ,'user.update'     ],
            [ 'Logística'             ,'user.destroy'    ],
            [ 'Logística'             ,'user.recover'    ],
            [ 'Logística'             ,'user.inactivate' ],
            [ 'Logística'             ,'user.activate'   ],
            [ 'Logística'             ,'user.block'      ],
            [ 'Logística'             ,'user.unblock'    ],
            [ 'Logística'             ,'user.audit'      ],

            [ 'Faturamento'           ,'user.index'      ],
            [ 'Faturamento'           ,'user.show'       ],
            [ 'Faturamento'           ,'user.store'      ],
            [ 'Faturamento'           ,'user.update'     ],
            [ 'Faturamento'           ,'user.destroy'    ],
            [ 'Faturamento'           ,'user.recover'    ],
            [ 'Faturamento'           ,'user.inactivate' ],
            [ 'Faturamento'           ,'user.activate'   ],
            [ 'Faturamento'           ,'user.block'      ],
            [ 'Faturamento'           ,'user.unblock'    ],
            [ 'Faturamento'           ,'user.audit'      ],

            [ 'Gerente de Contas'     ,'user.index'      ],
            [ 'Gerente de Contas'     ,'user.show'       ],
            [ 'Gerente de Contas'     ,'user.store'      ],
            [ 'Gerente de Contas'     ,'user.update'     ],
            [ 'Gerente de Contas'     ,'user.destroy'    ],
            [ 'Gerente de Contas'     ,'user.recover'    ],
            [ 'Gerente de Contas'     ,'user.inactivate' ],
            [ 'Gerente de Contas'     ,'user.activate'   ],
            [ 'Gerente de Contas'     ,'user.block'      ],
            [ 'Gerente de Contas'     ,'user.unblock'    ],
            [ 'Gerente de Contas'     ,'user.audit'      ],

            [ 'Financeiro'            ,'user.index'      ],
            [ 'Financeiro'            ,'user.show'       ],
            [ 'Financeiro'            ,'user.store'      ],
            [ 'Financeiro'            ,'user.update'     ],
            [ 'Financeiro'            ,'user.destroy'    ],
            [ 'Financeiro'            ,'user.recover'    ],
            [ 'Financeiro'            ,'user.inactivate' ],
            [ 'Financeiro'            ,'user.activate'   ],
            [ 'Financeiro'            ,'user.block'      ],
            [ 'Financeiro'            ,'user.unblock'    ],
            [ 'Financeiro'            ,'user.audit'      ],

            [ 'Cliente'               ,'user.index'      ],
            [ 'Cliente'               ,'user.show'       ],
            [ 'Cliente'               ,'user.store'      ],
            [ 'Cliente'               ,'user.update'     ],
            [ 'Cliente'               ,'user.destroy'    ],
            [ 'Cliente'               ,'user.recover'    ],
            [ 'Cliente'               ,'user.inactivate' ],
            [ 'Cliente'               ,'user.activate'   ],
            [ 'Cliente'               ,'user.block'      ],
            [ 'Cliente'               ,'user.unblock'    ],
            [ 'Cliente'               ,'user.audit'      ],

            [ 'Suporte'               ,'user.index'      ],
            [ 'Suporte'               ,'user.show'       ],
            [ 'Suporte'               ,'user.store'      ],
            [ 'Suporte'               ,'user.update'     ],
            [ 'Suporte'               ,'user.destroy'    ],
            [ 'Suporte'               ,'user.recover'    ],
            [ 'Suporte'               ,'user.inactivate' ],
            [ 'Suporte'               ,'user.activate'   ],
            [ 'Suporte'               ,'user.block'      ],
            [ 'Suporte'               ,'user.unblock'    ],
            [ 'Suporte'               ,'user.audit'      ],

            [ 'Controle de Qualidade' ,'user.index'      ],
            [ 'Controle de Qualidade' ,'user.show'       ],
            [ 'Controle de Qualidade' ,'user.store'      ],
            [ 'Controle de Qualidade' ,'user.update'     ],
            [ 'Controle de Qualidade' ,'user.destroy'    ],
            [ 'Controle de Qualidade' ,'user.recover'    ],
            [ 'Controle de Qualidade' ,'user.inactivate' ],
            [ 'Controle de Qualidade' ,'user.activate'   ],
            [ 'Controle de Qualidade' ,'user.block'      ],
            [ 'Controle de Qualidade' ,'user.unblock'    ],
            [ 'Controle de Qualidade' ,'user.audit'      ],

            [ 'Gerente operacional'   ,'user.index'      ],
            [ 'Gerente operacional'   ,'user.show'       ],
            [ 'Gerente operacional'   ,'user.store'      ],
            [ 'Gerente operacional'   ,'user.update'     ],
            [ 'Gerente operacional'   ,'user.destroy'    ],
            [ 'Gerente operacional'   ,'user.recover'    ],
            [ 'Gerente operacional'   ,'user.inactivate' ],
            [ 'Gerente operacional'   ,'user.activate'   ],
            [ 'Gerente operacional'   ,'user.block'      ],
            [ 'Gerente operacional'   ,'user.unblock'    ],
            [ 'Gerente operacional'   ,'user.audit'      ],

            [ 'Gerente comercial'     ,'user.index'      ],
            [ 'Gerente comercial'     ,'user.show'       ],
            [ 'Gerente comercial'     ,'user.store'      ],
            [ 'Gerente comercial'     ,'user.update'     ],
            [ 'Gerente comercial'     ,'user.destroy'    ],
            [ 'Gerente comercial'     ,'user.recover'    ],
            [ 'Gerente comercial'     ,'user.inactivate' ],
            [ 'Gerente comercial'     ,'user.activate'   ],
            [ 'Gerente comercial'     ,'user.block'      ],
            [ 'Gerente comercial'     ,'user.unblock'    ],
            [ 'Gerente comercial'     ,'user.audit'      ],

            [ 'Desenvolvedor'         ,'user.index'      ],
            [ 'Desenvolvedor'         ,'user.show'       ],
            [ 'Desenvolvedor'         ,'user.store'      ],
            [ 'Desenvolvedor'         ,'user.update'     ],
            [ 'Desenvolvedor'         ,'user.destroy'    ],
            [ 'Desenvolvedor'         ,'user.recover'    ],
            [ 'Desenvolvedor'         ,'user.inactivate' ],
            [ 'Desenvolvedor'         ,'user.activate'   ],
            [ 'Desenvolvedor'         ,'user.block'      ],
            [ 'Desenvolvedor'         ,'user.unblock'    ],
            [ 'Desenvolvedor'         ,'user.audit'      ],

            [ 'DBA'                   ,'user.index'      ],
            [ 'DBA'                   ,'user.show'       ],
            [ 'DBA'                   ,'user.store'      ],
            [ 'DBA'                   ,'user.update'     ],
            [ 'DBA'                   ,'user.destroy'    ],
            [ 'DBA'                   ,'user.recover'    ],
            [ 'DBA'                   ,'user.inactivate' ],
            [ 'DBA'                   ,'user.activate'   ],
            [ 'DBA'                   ,'user.block'      ],
            [ 'DBA'                   ,'user.unblock'    ],
            [ 'DBA'                   ,'user.audit'      ],

            [ 'Sistema'               ,'user.index'      ],
            [ 'Sistema'               ,'user.show'       ],
            [ 'Sistema'               ,'user.store'      ],
            [ 'Sistema'               ,'user.update'     ],
            [ 'Sistema'               ,'user.destroy'    ],
            [ 'Sistema'               ,'user.recover'    ],
            [ 'Sistema'               ,'user.inactivate' ],
            [ 'Sistema'               ,'user.activate'   ],
            [ 'Sistema'               ,'user.block'      ],
            [ 'Sistema'               ,'user.unblock'    ],
            [ 'Sistema'               ,'user.audit'      ],

            [ 'Gerente de contratos'  ,'user.index'      ],
            [ 'Gerente de contratos'  ,'user.show'       ],
            [ 'Gerente de contratos'  ,'user.store'      ],
            [ 'Gerente de contratos'  ,'user.update'     ],
            [ 'Gerente de contratos'  ,'user.destroy'    ],
            [ 'Gerente de contratos'  ,'user.recover'    ],
            [ 'Gerente de contratos'  ,'user.inactivate' ],
            [ 'Gerente de contratos'  ,'user.activate'   ],
            [ 'Gerente de contratos'  ,'user.block'      ],
            [ 'Gerente de contratos'  ,'user.unblock'    ],
            [ 'Gerente de contratos'  ,'user.audit'      ],

            [ 'Gerente de canais'     ,'user.index'      ],
            [ 'Gerente de canais'     ,'user.show'       ],
            [ 'Gerente de canais'     ,'user.store'      ],
            [ 'Gerente de canais'     ,'user.update'     ],
            [ 'Gerente de canais'     ,'user.destroy'    ],
            [ 'Gerente de canais'     ,'user.recover'    ],
            [ 'Gerente de canais'     ,'user.inactivate' ],
            [ 'Gerente de canais'     ,'user.activate'   ],
            [ 'Gerente de canais'     ,'user.block'      ],
            [ 'Gerente de canais'     ,'user.unblock'    ],
            [ 'Gerente de canais'     ,'user.audit'      ],

            [ 'Teste'                 ,'client' ],
            [ 'Administrador'         ,'client' ],
            [ 'Motorista'             ,'client' ],
            [ 'Atendente'             ,'client' ],
            [ 'Presidencia'           ,'client' ],
            [ 'Desenvolvedor'         ,'client' ],
            [ 'Logística'             ,'client' ],
            [ 'Faturamento'           ,'client' ],
            [ 'Gerente de Contas'     ,'client' ],
            [ 'Financeiro'            ,'client' ],
            [ 'Cliente'               ,'client' ],
            [ 'Suporte'               ,'client' ],
            [ 'Controle de Qualidade' ,'client' ],
            [ 'Gerente operacional'   ,'client' ],
            [ 'Gerente comercial'     ,'client' ],
            [ 'Desenvolvedor'         ,'client' ],
            [ 'DBA'                   ,'client' ],
            [ 'Sistema'               ,'client' ],
            [ 'Gerente de contratos'  ,'client' ],
            [ 'Gerente de canais'     ,'client' ],
        
            //Authentication 
            [ 'Teste'                 ,'auth'   ],
            [ 'Administrador'         ,'auth'   ],
            [ 'Motorista'             ,'auth'   ],
            [ 'Atendente'             ,'auth'   ],
            [ 'Presidencia'           ,'auth'   ],
            [ 'Desenvolvedor'         ,'auth'   ],
            [ 'Logística'             ,'auth'   ],
            [ 'Faturamento'           ,'auth'   ],
            [ 'Gerente de Contas'     ,'auth'   ],
            [ 'Financeiro'            ,'auth'   ],
            [ 'Cliente'               ,'auth'   ],
            [ 'Suporte'               ,'auth'   ],
            [ 'Controle de Qualidade' ,'auth'   ],
            [ 'Gerente operacional'   ,'auth'   ],
            [ 'Gerente comercial'     ,'auth'   ],
            [ 'Desenvolvedor'         ,'auth'   ],
            [ 'DBA'                   ,'auth'   ],
            [ 'Sistema'               ,'auth'   ],
            [ 'Gerente de contratos'  ,'auth'   ],
            [ 'Gerente de canais'     ,'auth'   ],

            [ 'Teste'                 ,'auth.login'   ],
            [ 'Administrador'         ,'auth.login'   ],
            [ 'Motorista'             ,'auth.login'   ],
            [ 'Atendente'             ,'auth.login'   ],
            [ 'Presidencia'           ,'auth.login'   ],
            [ 'Desenvolvedor'         ,'auth.login'   ],
            [ 'Logística'             ,'auth.login'   ],
            [ 'Faturamento'           ,'auth.login'   ],
            [ 'Gerente de Contas'     ,'auth.login'   ],
            [ 'Financeiro'            ,'auth.login'   ],
            [ 'Cliente'               ,'auth.login'   ],
            [ 'Suporte'               ,'auth.login'   ],
            [ 'Controle de Qualidade' ,'auth.login'   ],
            [ 'Gerente operacional'   ,'auth.login'   ],
            [ 'Gerente comercial'     ,'auth.login'   ],
            [ 'Desenvolvedor'         ,'auth.login'   ],
            [ 'DBA'                   ,'auth.login'   ],
            [ 'Sistema'               ,'auth.login'   ],
            [ 'Gerente de contratos'  ,'auth.login'   ],
            [ 'Gerente de canais'     ,'auth.login'   ],

            [ 'Teste'                 ,'auth.logout'   ],
            [ 'Administrador'         ,'auth.logout'   ],
            [ 'Motorista'             ,'auth.logout'   ],
            [ 'Atendente'             ,'auth.logout'   ],
            [ 'Presidencia'           ,'auth.logout'   ],
            [ 'Desenvolvedor'         ,'auth.logout'   ],
            [ 'Logística'             ,'auth.logout'   ],
            [ 'Faturamento'           ,'auth.logout'   ],
            [ 'Gerente de Contas'     ,'auth.logout'   ],
            [ 'Financeiro'            ,'auth.logout'   ],
            [ 'Cliente'               ,'auth.logout'   ],
            [ 'Suporte'               ,'auth.logout'   ],
            [ 'Controle de Qualidade' ,'auth.logout'   ],
            [ 'Gerente operacional'   ,'auth.logout'   ],
            [ 'Gerente comercial'     ,'auth.logout'   ],
            [ 'Desenvolvedor'         ,'auth.logout'   ],
            [ 'DBA'                   ,'auth.logout'   ],
            [ 'Sistema'               ,'auth.logout'   ],
            [ 'Gerente de contratos'  ,'auth.logout'   ],
            [ 'Gerente de canais'     ,'auth.logout'   ],

            [ 'Teste'                 ,'user.information'   ],
            [ 'Administrador'         ,'user.information'   ],
            [ 'Motorista'             ,'user.information'   ],
            [ 'Atendente'             ,'user.information'   ],
            [ 'Presidencia'           ,'user.information'   ],
            [ 'Desenvolvedor'         ,'user.information'   ],
            [ 'Logística'             ,'user.information'   ],
            [ 'Faturamento'           ,'user.information'   ],
            [ 'Gerente de Contas'     ,'user.information'   ],
            [ 'Financeiro'            ,'user.information'   ],
            [ 'Cliente'               ,'user.information'   ],
            [ 'Suporte'               ,'user.information'   ],
            [ 'Controle de Qualidade' ,'user.information'   ],
            [ 'Gerente operacional'   ,'user.information'   ],
            [ 'Gerente comercial'     ,'user.information'   ],
            [ 'Desenvolvedor'         ,'user.information'   ],
            [ 'DBA'                   ,'user.information'   ],
            [ 'Sistema'               ,'user.information'   ],
            [ 'Gerente de contratos'  ,'user.information'   ],
            [ 'Gerente de canais'     ,'user.information'   ],

            [ 'Teste'                 ,'user.permission'    ],
            [ 'Administrador'         ,'user.permission'    ],
            [ 'Motorista'             ,'user.permission'    ],
            [ 'Atendente'             ,'user.permission'    ],
            [ 'Presidencia'           ,'user.permission'    ],
            [ 'Desenvolvedor'         ,'user.permission'    ],
            [ 'Logística'             ,'user.permission'    ],
            [ 'Faturamento'           ,'user.permission'    ],
            [ 'Gerente de Contas'     ,'user.permission'    ],
            [ 'Financeiro'            ,'user.permission'    ],
            [ 'Cliente'               ,'user.permission'    ],
            [ 'Suporte'               ,'user.permission'    ],
            [ 'Controle de Qualidade' ,'user.permission'    ],
            [ 'Gerente operacional'   ,'user.permission'    ],
            [ 'Gerente comercial'     ,'user.permission'    ],
            [ 'Desenvolvedor'         ,'user.permission'    ],
            [ 'DBA'                   ,'user.permission'    ],
            [ 'Sistema'               ,'user.permission'    ],
            [ 'Gerente de contratos'  ,'user.permission'    ],
            [ 'Gerente de canais'     ,'user.permission'    ],
            
            //Statuses
            /*Status Recover*/
            [ 'Administrador'      ,"status.recover"            ],
            [ 'Presidencia'        ,"status.recover"            ],
            [ 'Teste'              ,"status.recover"            ],
            [ 'Desenvolvedor'      ,"status.recover"            ],
            [ 'Sistema'            ,"status.recover"            ],

            /*Status Delete*/
            [ 'Administrador'      ,"status.delete"             ],
            [ 'Presidencia'        ,"status.delete"             ],
            [ 'Teste'              ,"status.delete"             ],
            [ 'Desenvolvedor'      ,"status.delete"             ],
            [ 'Sistema'            ,"status.delete"             ],
             
            /*Status Deleted*/
            [ 'Administrador'      ,"status.deleted.view"       ],
            [ 'Presidencia'        ,"status.deleted.view"       ],
            [ 'Teste'              ,"status.deleted.view"       ],
            [ 'Desenvolvedor'      ,"status.deleted.view"       ],
            [ 'Sistema'            ,"status.deleted.view"       ],

            [ 'Administrador'      ,"status.deleted.update"     ],
            [ 'Presidencia'        ,"status.deleted.update"     ],
            [ 'Teste'              ,"status.deleted.update"     ],
            [ 'Desenvolvedor'      ,"status.deleted.update"     ],
            [ 'Sistema'            ,"status.deleted.update"     ],

            /*Status Ative*/
            [ 'Administrador'      ,"status.activate"           ],
            [ 'Presidencia'        ,"status.activate"           ],
            [ 'Teste'              ,"status.activate"           ],
            [ 'Desenvolvedor'      ,"status.activate"           ],
            [ 'Sistema'            ,"status.activate"           ],

            /*Status Inactivated*/
            [ 'Administrador'      ,"status.inactive"           ],
            [ 'Presidencia'        ,"status.inactive"           ],
            [ 'Teste'              ,"status.inactive"           ],
            [ 'Desenvolvedor'      ,"status.inactive"           ],
            [ 'Sistema'            ,"status.inactive"           ],

            [ 'Administrador'      ,"status.inactivated.view"   ],
            [ 'Presidencia'        ,"status.inactivated.view"   ],
            [ 'Teste'              ,"status.inactivated.view"   ],
            [ 'Desenvolvedor'      ,"status.inactivated.view"   ],
            [ 'Sistema'            ,"status.inactivated.view"   ],

            [ 'Administrador'      ,"status.inactivated.update" ],
            [ 'Presidencia'        ,"status.inactivated.update" ],
            [ 'Teste'              ,"status.inactivated.update" ],
            [ 'Desenvolvedor'      ,"status.inactivated.update" ],
            [ 'Sistema'            ,"status.inactivated.update" ],

            /*Status Blocked*/
            [ 'Administrador'      ,"status.block"              ],
            [ 'Presidencia'        ,"status.block"              ],
            [ 'Teste'              ,"status.block"              ],
            [ 'Desenvolvedor'      ,"status.block"              ],
            [ 'Sistema'            ,"status.block"              ],

            [ 'Administrador'      ,"status.blocked.view"       ],
            [ 'Presidencia'        ,"status.blocked.view"       ],
            [ 'Teste'              ,"status.blocked.view"       ],
            [ 'Desenvolvedor'      ,"status.blocked.view"       ],
            [ 'Sistema'            ,"status.blocked.view"       ],

            [ 'Administrador'      ,"status.blocked.update"     ],
            [ 'Presidencia'        ,"status.blocked.update"     ],
            [ 'Teste'              ,"status.blocked.update"     ],
            [ 'Desenvolvedor'      ,"status.blocked.update"     ],
            [ 'Sistema'            ,"status.blocked.update"     ],
            

            //Permission Group
            [ 'Administrador' ,"permission.group"         ],
            [ 'Administrador' ,"permission.group.show"    ],
            [ 'Administrador' ,"permission.group.index"   ],
            [ 'Administrador' ,"permission.group.store"   ],
            [ 'Administrador' ,"permission.group.update"  ],
            [ 'Administrador' ,"permission.group.destroy" ],
            [ 'Administrador' ,"permission.group.recover" ],

            //Permission Item
            [ 'Administrador' ,"permission.item"         ],
            [ 'Administrador' ,"permission.item.show"    ],
            [ 'Administrador' ,"permission.item.index"   ],
            [ 'Administrador' ,"permission.item.store"   ],
            [ 'Administrador' ,"permission.item.update"  ],
            [ 'Administrador' ,"permission.item.destroy" ],
            [ 'Administrador' ,"permission.item.recover" ],

            //Permission Map
            [ 'Administrador' ,"permission.map"         ],
            [ 'Administrador' ,"permission.map.show"    ],
            [ 'Administrador' ,"permission.map.index"   ],
            [ 'Administrador' ,"permission.map.store"   ],
            [ 'Administrador' ,"permission.map.update"  ],
            [ 'Administrador' ,"permission.map.destroy" ],
            [ 'Administrador' ,"permission.map.recover" ],
        ];

        Schema::disableForeignKeyConstraints();
        DB::table('permission_maps')->truncate();
        $counter = 0;
        foreach ($permisson_map as $map) {
            $permissionName = $map[0];
            $group = app(PermissionRepository::class)->where('name', $permissionName)->first();
            if (is_null($group))
                throw new PermissionGroupNotFound($permissionName);

            $permissionItemCode = $map[1];
            $item = app(PermissionItem::class)->where('code', $permissionItemCode)->first();
            if (is_null($item))
                throw new PermissionItemNotFound($permissionItemCode);

            $save = app(PermissionMapService::class)->associate($item, $group);
            if (is_string($save))
                throw new \Exception($save);

            if ($this->command)
                $this->command->info("Inserted Permission Map: Group: {$permissionName} | Item: {$permissionItemCode} [$counter]");
            else
                echo ("Inserted Permission Map: Group: {$permissionName} | Item: {$permissionItemCode} [$counter]\n");

            $counter += 1;
        }
        Schema::enableForeignKeyConstraints();
    }
}
