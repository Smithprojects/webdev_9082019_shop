let app = new Vue({
    el: '.app',
    data:{
        title: 'Привет, мир'
    }
});

let counter = new Vue({
    el: '.counter',
    data:{
        count: 10,
        countClick: 0,
        id: null,
        isStart: false,
        isFinish: false
    },
    methods:{
        play:function(){
            this.isStart = true;
            this.id = setInterval(()=>{
                if( this.count > 0 ){
                    this.count--;
                }else{
                    clearInterval(this.id);
                    if( this.countClick > 20 ){
                        alert('win');
                    }else{
                        alert('game over');
                    }

                    this.isFinish = true;
                }   
            }, 1000)
            console.log(this.count)    
        },
        onClick: function(){
            this.countClick++;

            if( this.countClick >= 20 ){
                alert('win');
                clearInterval(this.id);
                this.isFinish = true;
            }
        },
        onResume: function(){
            this.count = 10;
            this.countClick = 0;
            this.id = null;
            this.isStart = false;
            this.isFinish = false;
        }
    }
});