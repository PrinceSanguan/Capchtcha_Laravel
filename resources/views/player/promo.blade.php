@include('player.header')
@include('player.navbar')

@php
    $promos = ['promo1', 'promo2', 'promo3', 'promo4', 'promo5', 'promo6'];
    $disabled = false;
    foreach ($promos as $promo) {
        if ($users->$promo == 'pending') {
            $disabled = true;
            break;
        }
    }
@endphp


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-3">
          <div class="col-sm-3">
            <h1 class="m-0">Promo Trial</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
      
<div class="row">

  @if(session('success'))
  <div id="success-alert" class="alert alert-success" style="font-size: 18px; padding: 20px;">
      {{ session('success') }}
  </div>
  <script>
      setTimeout(function() {
          document.getElementById('success-alert').style.display = 'none';
      }, 5000);
  </script>
  @endif 


<!--------------------------------10 pesos = 10 trial--------------------------------------------->

<div class="col-lg-3 col-6">
  <!-- small card -->
  <div class="small-box {{ $users->promo1 === 'activate' ? 'bg-red' : 'bg-yellow' }}">
    <div class="inner">
      @if($users->promo1 === 'activate')
        <h4 style="font-weight: bold">Promo Not Available</h4>
        <h5>X</h5>
      @else
        <h4 style="font-weight: bold">10 Trial Promo</h4>
        <h5>&#8369;10.00</h5>
      @endif
    </div>
    <div class="icon">
      <i class="fas fa-wallet"></i>
    </div>

    @if($users->promo1 !== 'activate')
      <form method="post" action="{{ route('player.update_promo1')}}">
        @csrf
        <div class="text-center"> <!-- Bootstrap's centering class -->
          <input type="hidden" name="promo1" value="pending">
            <button type="submit" class="small-box-footer btn btn-success buy-now" {{ $disabled ? 'disabled' : '' }}>
              Buy now!<i class="fas fa-arrow-circle-right"></i>
            </button>
        </div>
      </form>
    @endif

  </div>
</div>


<!--------------------------------10 pesos = 10 trial--------------------------------------------->

<!--------------------------------50 pesos = 70 trial--------------------------------------------->
<div class="col-lg-3 col-6">
  <!-- small card -->
  <div class="small-box {{ $users->promo2 === 'activate' ? 'bg-red' : 'bg-blue' }}">
    <div class="inner">
      @if($users->promo2 === 'activate')
        <h4 style="font-weight: bold">Promo Not Available</h4>
        <h5>X</h5>
      @else
        <h4 style="font-weight: bold">70 Trial Promo</h4>
        <h5>&#8369;50.00</h5>
      @endif
    </div>
    <div class="icon">
      <i class="fas fa-wallet"></i>
    </div>

    @if($users->promo2 !== 'activate')
      <form method="post" action="{{ route('player.update_promo2')}}">
        @csrf
        <div class="text-center"> <!-- Bootstrap's centering class -->
          <input type="hidden" name="promo2" value="pending">
            <button type="submit" class="small-box-footer btn btn-success buy-now" {{ $disabled ? 'disabled' : '' }}>
              Buy now!<i class="fas fa-arrow-circle-right"></i>
            </button>
        </div>
      </form>
    @endif

  </div>
</div>


<!--------------------------------50 pesos = 70 trial--------------------------------------------->

<!--------------------------------200 pesos = 270 trial--------------------------------------------->
<div class="col-lg-3 col-6">
  <!-- small card -->
  <div class="small-box {{ $users->promo3 === 'activate' ? 'bg-red' : 'bg-green' }}">
    <div class="inner">
      @if($users->promo3 === 'activate')
        <h4 style="font-weight: bold">Promo Not Available</h4>
        <h5>X</h5>
      @else
        <h4 style="font-weight: bold">270 Trial Promo</h4>
        <h5>&#8369;200.00</h5>
      @endif
    </div>
    <div class="icon">
      <i class="fas fa-wallet"></i>
    </div>

    @if($users->promo3 !== 'activate')
      <form method="post" action="{{ route('player.update_promo3')}}">
        @csrf
        <div class="text-center"> <!-- Bootstrap's centering class -->
          <input type="hidden" name="promo3" value="pending">
            <button type="submit" class="small-box-footer btn btn-success buy-now" {{ $disabled ? 'disabled' : '' }}>
              Buy now!<i class="fas fa-arrow-circle-right"></i>
            </button>
        </div>
      </form>
    @endif

  </div>
</div>

<!--------------------------------200 pesos = 270 trial--------------------------------------------->

<!--------------------------------500 pesos = 650 trial--------------------------------------------->
<div class="col-lg-3 col-6">
  <!-- small card -->
  <div class="small-box {{ $users->promo4 === 'activate' ? 'bg-red' : 'bg-orange' }}">
    <div class="inner">
      @if($users->promo4 === 'activate')
        <h4 style="font-weight: bold">Promo Not Available</h4>
        <h5>X</h5>
      @else
        <h4 style="font-weight: bold">650 Trial Promo</h4>
        <h5>&#8369;500.00</h5>
      @endif
    </div>
    <div class="icon">
      <i class="fas fa-wallet"></i>
    </div>

    @if($users->promo4 !== 'activate')
      <form method="post" action="{{ route('player.update_promo4')}}">
        @csrf
        <div class="text-center"> <!-- Bootstrap's centering class -->
          <input type="hidden" name="promo4" value="pending">
            <button type="submit" class="small-box-footer btn btn-success buy-now" {{ $disabled ? 'disabled' : '' }}>
              Buy now!<i class="fas fa-arrow-circle-right"></i>
            </button>
        </div>
      </form>
    @endif

  </div>
</div>
<!--------------------------------500 pesos = 650 trial--------------------------------------------->

<!--------------------------------1000 pesos = 3500 trial--------------------------------------------->
<div class="col-lg-3 col-6">
  <!-- small card -->
  <div class="small-box {{ $users->promo5 === 'activate' ? 'bg-red' : 'bg-violet' }}">
    <div class="inner">
      @if($users->promo5 === 'activate')
        <h4 style="font-weight: bold">Promo Not Available</h4>
        <h5>X</h5>
      @else
        <h5 style="font-weight: bold">3,500 Trial Promo</h5>
        <h5>&#8369;1,000.00</h5>
      @endif
    </div>
    <div class="icon">
      <i class="fas fa-wallet"></i>
    </div>

    @if($users->promo5 !== 'activate')
      <form method="post" action="{{ route('player.update_promo5')}}">
        @csrf
        <div class="text-center"> <!-- Bootstrap's centering class -->
          <input type="hidden" name="promo5" value="pending">
            <button type="submit" class="small-box-footer btn btn-success buy-now" {{ $disabled ? 'disabled' : '' }}>
              Buy now!<i class="fas fa-arrow-circle-right"></i>
            </button>
        </div>
      </form>
    @endif

  </div>
</div>

<!--------------------------------1000 pesos = 3500 trial--------------------------------------------->

<!--------------------------------5000 pesos = 10000 trial--------------------------------------------->
<div class="col-lg-3 col-6">
  <!-- small card -->
  <div class="small-box {{ $users->promo6 === 'activate' ? 'bg-red' : 'bg-red' }}">
    <div class="inner">
      @if($users->promo6 === 'activate')
        <h4 style="font-weight: bold">Promo Not Available</h4>
        <h5>X</h5>
      @else
        <h5 style="font-weight: bold">10,000 Trial Promo</h5>
        <h5>&#8369;5,000.00</h5>
      @endif
    </div>
    <div class="icon">
      <i class="fas fa-wallet"></i>
    </div>

    @if($users->promo6 !== 'activate')
      <form method="post" action="{{ route('player.update_promo6')}}">
        @csrf
        <div class="text-center"> <!-- Bootstrap's centering class -->
          <input type="hidden" name="promo6" value="pending">
            <button type="submit" class="small-box-footer btn btn-success buy-now" {{ $disabled ? 'disabled' : '' }}>
              Buy now!<i class="fas fa-arrow-circle-right"></i>
            </button>
        </div>
      </form>
    @endif

  </div>
</div>

<!--------------------------------5000 pesos = 10000 trial--------------------------------------------->

</div>
    </div>
    <!-------------------------------------------------------------------------------------- Main content -->
        </div>
      </div>
    </div>
  </div>
  <!-- /.content-wrapper -->

  <script>
    // JavaScript to handle the click event and show the confirmation alert
    document.addEventListener('DOMContentLoaded', function() {
      const buyNowButtons = document.querySelectorAll('.buy-now');
      buyNowButtons.forEach(button => {
        button.addEventListener('click', function(event) {
          console.log('Buy now button clicked'); // Add this line for debugging
          const confirmation = confirm('Are you sure you want to buy it?');
          if (!confirmation) {
            event.preventDefault(); // Prevent the default action if user cancels
          }
        });
      });
    });
  </script>

  @include('player.footer')