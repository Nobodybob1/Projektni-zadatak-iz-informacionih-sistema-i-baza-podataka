<form action="/search" method="post">
    @csrf
    <div class="container-fluid booking mt-5 pb-5">
        <div class="container pb-5">
            <div class="bg-light shadow" style="padding: 30px;">
                <div class="row align-items-center" style="min-height: 60px;">
                    <div class="col-md-10">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-4 mb-md-0">
                                    <input type="text" name="name" value="{{old('name')}}" class="form-control p-4" placeholder="Name">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-4 mb-md-0">
                                    <div  data-target-input="nearest">
                                        <input type="date" name="start_date" class="form-control p-4" min="{{date('Y-m-d')}}" placeholder="Depart Date"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-4 mb-md-0">
                                    <div data-target-input="nearest">
                                        <input type="date" name="end_date" class="form-control p-4" min="{{date('Y-m-d')}}" placeholder="Return Date"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-md-4">
                                <div class="mb-4 mb-md-0">
                                    <input type="text" name="location_state" value="{{old('location_state')}}" class="form-control p-4" placeholder="Location/State">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-4 mb-md-0">
                                    <input type="text" name="location_continent" value="{{old('location_continent')}}" class="form-control p-4" placeholder="Location/Continent">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-4 mb-md-0">
                                    <select class="custom-select px-4" name="transport_type" style="height: 47px;">
                                        <option value="{{null}}" selected>Type of transportation</option>
                                        <option value="bus">Bus</option>
                                        <option value="plane">Airplane</option>
                                        <option value="ship">Ship</option>
                                        <option value="train">Train</option>
                                        <option value="individual">Individual</option>
                                    </select>
                                    
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-primary btn-block" type="submit" style="height: 47px; margin-top: -2px;">Search</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>