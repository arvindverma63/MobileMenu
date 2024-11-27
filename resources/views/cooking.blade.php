<!DOCTYPE html>
<html lang="en">
@include('partials.head')

<body>
    @include('partials.navbar')

    <section class="h-100">
        <div class="container h-100 py-5">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-10">
                    <img src="{{ asset('foodImages/cook.gif') }}" style=" height: 300px; /* You must set a specified height */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;">

                </div>
                  <form>
                    <div class="form-group">
                      <label for="exampleFormControlTextarea1">FeedBack</label>
                      <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                    <div class="form-group mt-2">
                        <button type="submit" class="btn btn-primary btn-lg btn-block">Submit Feedback</dutton>
                    </div>
                  </form>
            </div>
        </div>
    </section>


    @include('partials.bottom-nav')
    @include('partials.footer')
</body>

</html>
