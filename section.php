<section id="main"><br><br><br><br><br>
	<div class="line_one">
<div class="left_1">
<p><img src="images/learn.jpg"title="Обучение персонала"></p>Обучение персонала</p>
</div>

<div class="right_1">
<p><img src="images/atestation.jpg"title="Аттестация сотрудников">Аттестация сотрудников</p>
</div>
</div>

<div class="line_two">

<div class="left_2">
<p><img src="images/ocenka.jpg"title="Подбор и оценка персонала">Подбор и оценка персонала</p>
</div>

<div class="right_2">
<p><img src="images/psihology.jpg"title="Психология">Психология персонала</p>
</div>

</div>
<div class="line_three">

<div class="left_3">
<p><img src="images/motivation.jpg"title="Мотивация сотрудников">Мотивация сотрудников</p>
</div>

<div class="right_3">
<p><img src="images/many.jpg"title="Оплата труда">Оплаты труда сотрудников</p>
</div>

</div>
</section>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="js/main.js"></script>
	<script>
  $(document).ready(function(){
    $("a[href*=\\#]").on("click", function(e){
				e.preventDefault();
        var anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: $(anchor.attr('href')).offset().top
        }, 777);
        return false;
    });
});
</script>
</body>
</html>
