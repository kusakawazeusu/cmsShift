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
    	Eloquent::unguard(); 
        
        //group -> gametype ->machine
       /* $this->call('arcade_game_type_group_seeder');
        $this->call('arcade_game_type_seeder');
        $this->call('arcade_machine_table_seeder');*/

       /* $this->call('operator_group');
        $this->call('operators');*/

      /*  $this->call('period');
        $this->call('perioddate');

        $this->call('log_event_seeder');

        $this->call('sessions');
        $this->call('sessions_seed');

        $this->call('playersession_seed');

        $this->call('member_seeder');
        $this->call('member_card_seeder');*/
 		
        //$this->call('TicketIssuanceSeeder');
        //$this->call('TicketVoidSeeder');
        //$this->call('ValidationSeeder');
        //$this->call('SlotTicketCashoutSeeder');
        //$this->call('SlotTicketRedemptionSeeder');
        //$this->call('SoftDropVarianceSeeder');
        //$this->call('SessionCloseSeeder');

        //$this->call('period');
        $this->call('memberacctranslist');
        //$this->call('memberbetlog');
        //$this->call('handpay');
        //$this->call('arcade_game_type_group_seeder');
        //$this->call('MemberCashlessTrans');
    }
}
