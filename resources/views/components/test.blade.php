<div>
    đây là component 
</div>
<form action="" method="post">
    @csrf
    <h3>LOGIN <?php echo date('d/m/Y-H:i:s')?></h3>
    <div class="form-group">
        <input type="text" name="namea" placeholder = "Username..." />
    </div>
    <button type="submit">ok</button>
    {{-- <h1>{{!empty($us)?$us:''}}</h1> --}}
    @if (session('message'))
        <div>{{session('message')}}</div>
        
    @endif