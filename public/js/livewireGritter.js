window.livewire.on('message', function (param) {
    
    var type = param['type'];
    var message = param['message'];

    switch(type){
        case 'success':
            var unique_id = $.gritter.add({
                // (string | mandatory) the heading of the notification
                title: 'Sucesso',
                // (string | mandatory) the text inside the notification
                text: message,
                // (bool | optional) if you want it to fade out on its own or just sit there
                sticky: true,
                // (int | optional) the time you want it to be alive for before fading out
                time: 5000,
                // (string | optional) the class name you want to apply to that specific message
                class_name: 'my-sticky-class'
            });
            break;
    }
});