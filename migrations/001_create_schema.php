<?php

namespace Fuel\Migrations;

class Create_Schema
{
    public function up()
    {

        ///////////
        // POSTS //
        ///////////

        \DBUtil::create_table('posts', array(
            'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true),
            'posted_on' => array('type' => 'timestamp'),
            'title' => array('constraint' => 255, 'type' => 'varchar'),
            'image' => array('constraint' => 255, 'type' => 'varchar'),
            'text' => array('type' => 'text'),
            'user_id' => array('constraint' => 11, 'type' => 'int'),
        ), array('id'), false, 'InnoDB', 'utf8_general_ci');

        ///////////////////
        // POST COMMENTS //
        ///////////////////

        \DBUtil::create_table('post_comments', array(
                'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true),
                'commented_on' => array('type' => 'timestamp'),
                'comment' => array('type' => 'text'),
                'post_id' => array('constraint' => 11, 'type' => 'int'),
                'user_id' => array('constraint' => 11, 'type' => 'int'),
            ), array('id'), false, 'InnoDB', 'utf8_general_ci',
            array(
                array(
                    'key' => 'post_id',
                    'reference' => array(
                        'table' => 'posts',
                        'column' => 'id',
                    ),
                    'on_delete' => 'CASCADE',
                ),
            )
        );

    }

    public function down()
    {
        \DBUtil::drop_table('post_comments');
        \DBUtil::drop_table('posts');
    }
}