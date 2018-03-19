function gerisay(a,toplam,loc){
    if(a>0){
        var yenile=setInterval(function(){
            a--;
            var toplamsayi = Math.floor(toplam / 100);            
            var sonuc_sayi = a / toplamsayi;
            var sonuc_sayi = Math.ceil(100 - sonuc_sayi);

            $( ".progress-bar" ).attr( "aria-valuenow", sonuc_sayi );
            $( ".progress-bar" ).css( "width", sonuc_sayi+"%" );
            $("#sayac_yuzde").html(sonuc_sayi+"%");

           
            if(a>=3600){
                saat=Math.floor(a/3600);
                dakika=Math.floor((a%3600)/60);
                saniye=(a%3600)%60;
                sonuc=saat+':'+dakika+':'+saniye+'';
                $("#sayac").html(sonuc);
            }else if(a>=60){
                dakika=Math.floor(a/60);
                saniye=a%60;
                sonuc=dakika+':'+saniye+'';
                $("#sayac").html(sonuc);
            }else if(a>=0){
                sonuc=a+'';
                $("#sayac").html(sonuc);
            }else{
                $("#sayac").html('Time Finish');
                location.href = 'session.php?q=lookscreen';
                if(a==0){
                    clearInterval(yenile);
                }
            }
        }, 1000);
    }
}


    var saniye=10;
    var dakika=0;
    var saat=0;
    var toplam=parseInt(saat)+parseInt(dakika)+parseInt(saniye);
    //geri sayma fonksiyonuna gönder