<?php
/**
 *shop商城系统
 */


namespace addon\pointexchange\event;

/**
 * 会员账户变化来源类型
 */
class MemberAccountFromType
{
    
	public function handle($data)
	{
	    $from_type = [

	        'point' => [
	            'pointexchange' => [
	                'type_name' => '积分兑换',
                    'type_url' => ''
	            ],
	           
	        ]
	    ];
        if($data == ''){
            return $from_type;
        }else{
            if(isset($from_type[$data])){
                return $from_type[$data];
            }else{
                return [];
            }
        }

	}
}