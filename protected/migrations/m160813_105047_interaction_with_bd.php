<?php

class m160813_105047_interaction_with_bd extends CDbMigration
{
	public function up()
	{
            $this->getDbConnection()->schema( 'CREATE DATABASE test2' );
            
            $this->createTable( 'tbl_test', array(
                'id' => 'int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY',
                'name' => 'text',
                'sum_income' => 'int',
                'date_income' => 'timestamp',
            ));
            
            $this->insertMultiple( 'tbl_test', $this->returnArray() );
            

            $this->get();            
            
            
            
            //CDbSchema
            
            //Yii::app()->components;
            
	}

	public function down()
	{
		echo "m160813_105047_interaction_with_bd does not support migration down.\n";
		return false;
	}

	/*
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}
	*/
        


        private function get() {
            $result = Yii::app()->db->createCommand()
                ->select('*')
                ->from(self::tableName());
            return $result;
        }

        private function returnArray() {
            for ( $i = 1; $i <= $this->returnAmountItem(); $i++ ) 
            {
                $all[ $i ] = array( 'name' => $this->returnName(), 'sum_income' => $this->returnSum() );
            }
            return $all;
        }    

        private function returnAmountItem() {
            return rand( 1, 20 );
        }

        private function returnName() {
            return 'name'.rand( 1, 3 );
        }

        private function returnSum() {
            return rand( 10, 100 );
        }

}