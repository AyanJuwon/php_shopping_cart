<!-- include the rating javascript file -->
<script src="scripts/jquery.raty.js" type="text/javascript"></script>

<!-- to display rating bind this div -->

<div id="avg_ratings">
                  <strong>Ratings: </strong>No ratings for this product                </div>
<div id="rating_zone">
<div id="prd"></prd>
<!-- <input type ="hidden" name= "score" id="score"  > -->
<input type ="hidden" name='productId' value ='<?php echo "$product->id"?>' >
</div> <button class="btn btn-primary" type="button" id="submit">Submit</button>
</div>

<script>
  $(function() {
    $('#prd').raty({
      number: 5, starOff: 'scripts/images/star-off.png', starOn: 'scripts/images/star-on.png', width: 180, scoreName: "score",
    });
  });
</script>

<!-- when user submits the rating fire an ajax event -->
<script>
 $(document).ready(function() {
 $(document).on('click', '#submit', function() {
      var score = $("#score").val();
      var score = $("input[name='score']").val();
      console.log(score);
      if (score.length > 0) {
        $("#rating_zone").html('processing...');
        $.post("save_rating.php", {
          productId: "<?php echo $product->id; ?>",
          rating: score
        }, function(data) {
            console.log(data);
          if (!data.error) {
            // display the new ratings 
            $("#avg_ratings").html(data.updated_rating);
            // display the success message
            $("#rating_zone").html('Your rating has been saved, ');
          } else {
            // display the failure message
            $("#rating_zone").html(data.message).show();
          }
        }
                );
      } else {
        alert("select the ratings.");
      }
  });



 });
 
</script>