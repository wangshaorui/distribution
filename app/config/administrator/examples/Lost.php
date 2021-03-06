<?php

return array(

    'title' => '失物',

    'single' => '失物',

    'model' => 'Lost',

    'columns' => array(
        'id',
        
        'title' => array(
            'title' => '标题',
        ),
        
        'content' => array(
            'title' => '内容',
        ),
        
        'type' => array(
            'title' => '类型',
        ),
        
        'author' => array(
            'title' => '作者',
            'relationship' => 'author',
            'select' => "(:table).name",
        ),
        
        'topic_id' => array(
            'title' => '评论话题ID',
        ),
        
        'comment_count' => array(
            'title' => '评论数',
        ),
        
        'status' => array(
            'title' => '状态',
        ),
        
        'created_at' => array(
            'title' => '发布时间',
        ),
    ),

    'filters' => array(
        'id',
        'title' => array(
            'title' => '标题',
        ),
    ),

    'edit_fields' => array(
        'id' => array(
            'title' => 'ID',
            'type' => 'key',
        ),
        
        'title' => array(
            'title' => '标题',
            'type' => 'text',
        ),
        
        'content' => array(
            'title' => '内容',
            'type' => 'textarea',
        ),
        
        'type' => array(
            'title' => '类型',
            'type' => 'number',
        ),
        
        'author' => array(
            'title' => '作者',
            'type' => 'relationship',
            'name_field' => 'name',
        ),
        
        'tag' => array(
            'title' => '标签',
            'type' => 'relationship',
            'name_field' => 'name',
        ),
        
        'status' => array(
            'title' => '状态',
            'type' => 'number',
        ),

    ),
    
    'form_width' => 900,
    
    
);