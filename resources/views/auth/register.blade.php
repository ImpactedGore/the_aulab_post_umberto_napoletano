<x-layout>

    <form action="{{route('register')}}" method="POST" class="m-5">
        @csrf

    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email address</label>
        <input type="email" name="email" class="form-control  @error('email') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp">
        @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="exampleInputName1" class="form-label">Username</label>
        <input type="text" name="name" class="form-control  @error('name') is-invalid @enderror" id="exampleInputName1" aria-describedby="nameHelp">
        @error('name')
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

    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Conferma Password</label>
        <input type="password" name="password_confirmation" class="form-control  @error('password_confirmation') is-invalid @enderror" id="exampleInputPassword1">
        @error('password_confirmation')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
    </form>

</x-layout>