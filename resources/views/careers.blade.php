<x-layout>
    <form action="{{route('careers.submit')}}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" class="form-control" name="email" value="{{Auth::user()->email}}" readonly required>
        </div>

        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Scegli il tuo ruolo</label>
            <select class="form-select" name="role" aria-label="Default select example" required>
                <option selected>Seleziona qui il tuo ruolo</option>
                <option value="writer">Writer</option>
                <option value="revisor">Revisor</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="msg" class="form-label">Presentati</label>
            <div class="form-floating">
                <textarea class="form-control" name="msg" maxlength="150" style="height: 100px" required></textarea>
                <label for="floatingTextarea2">Massimo 150 caratteri</label>
            </div>
        </div>        

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</x-layout>