<x-layout>

    <form action="{{route('login')}}" method="POST" class="m-5">
        @csrf

    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email address</label>
        <input type="email" name="email" class="form-control  @error('email') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp">
        @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type="password" name="password" class="form-control  @error('password') is-invalid @enderror" id="exampleInputPassword1">
        @error('password')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div>
        <label for="exampleInputPassword1" class="form-label">Ricordati</label>
        <input type="checkbox" name="remember">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
    </form>

</x-layout>