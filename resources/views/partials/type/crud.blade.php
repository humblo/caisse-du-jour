<main class="dashboard">
    <div class="container">
        <div class="row justify-content-center">
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <div class="mb-3">
                        <h2>{{ $h2 }}</h2>
                    </div>
                    <form name="form-update-type" method="post"
                          action="{{ $route}}">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <label for="date" class="form-label">Type</label>
                                <input type="text" class="form-control" name="operation-name" id="operation-name"
                                       value="{{ $value }}">
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-dark btn-block">Enregistrer</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
