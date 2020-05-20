<html>
    <p>
    multilingualisation
    <?php
        // echo __('messages.welcome');
        // echo __('I love programming.');
        //プレースホルダ
        echo __('messages.welcome', ['name' => 'dayle']);
        echo trans_choice('messages.apples', 10);
        echo trans_choice('time.minutes_ago', 5, ['value' => 5]);
    ?>
    
    {{-- {{ __('messages.welcome') }}
    @lang('messages.welcome') --}}
    </p>
</html>
