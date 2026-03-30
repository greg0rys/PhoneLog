<?php

use Illuminate\Support\Facades\Redis;

/* ensure we can get the global ticket counter key*/
it('can get the latest key', function(){
    expect(Redis::connection('db3')->get('global_ticket_counter'))->not()->toBeNull();
});