<?php

test( 'it gets a correct status code', function() {
    $this->get(route('api:v1:posts:index'))->assertStatus(200);
});