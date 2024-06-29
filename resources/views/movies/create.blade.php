<form action="{{ route('movies.store')}}" method="post">
  @csrf
  <label for="title">Title:</label><br>
  <input type="text" id="title" name="title"><br>
  <label for="premier_date">Premier date:</label><br>
  <input type="date" name="premier_date" id="premier_date"><br>
  <label for="score">Initial score:</label><br>
  <input type="number" name="score" id="score" value="1"><br>
  <label for="budget">Budget:</label><br>
  <input type="number" name="budget" id="budget" value="1"><br>
  <input type="submit" value="Save">
</form>
