<form action="/search" >
    @csrf
    <div class="container-fluid booking mt-5 pb-5">
        <div class="container pb-5">
            <div class="bg-light shadow" style="padding: 30px;">
                <div class="row align-items-center" style="min-height: 60px;">
                    <div class="col-md-10">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-4 mb-md-0">
                                    <input type="text" name="name" value="{{session('search')['name']}}" class="form-control p-4" placeholder="Name">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-4 mb-md-0">
                                    <div  data-target-input="nearest">
                                        <input type="date" name="start_date" value="{{session('search')['start_date']}}" class="start_date form-control p-4" min="{{date('Y-m-d')}}" placeholder="Depart Date"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-4 mb-md-0">
                                    <div data-target-input="nearest">
                                        <input type="date" name="end_date" value="{{session('search')['end_date']}}" class="end_date form-control p-4" min="{{date('Y-m-d')}}" placeholder="Return Date"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-md-4">
                                <div class="mb-4 mb-md-0">
                                    <input type="text" name="location_state" value="{{session('search')['location_state']}}" class="form-control p-4" placeholder="Location/State">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-4 mb-md-0">
                                    <input type="text" name="location_continent" value="{{session('search')['location_continent']}}" class="form-control p-4" placeholder="Location/Continent">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-4 mb-md-0">
                                    <select class="custom-select px-4" name="transport_type" style="height: 47px;">
                                        <option value="{{null}}"  {{ session('search')['transport_type'] == null ? 'selected' : '' }}>Type of transportation</option>
                                        <option value="bus" {{ session('search')['transport_type'] == 'bus' ? 'selected' : '' }}>Bus</option>
                                        <option value="plane" {{ session('search')['transport_type'] == 'plane' ? 'selected' : '' }} >Airplane</option>
                                        <option value="ship" {{ session('search')['transport_type'] == 'ship' ? 'selected' : '' }}>Ship</option>
                                        <option value="train" {{ session('search')['transport_type'] == 'train' ? 'selected' : '' }}>Train</option>
                                        <option value="individual" {{ session('search')['transport_type'] == 'individual' ? 'selected' : '' }}>Individual</option>
                                    </select>
                                    
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-primary btn-block" type="submit" style="height: 47px; margin-top: -2px;">Search</button>
                        <button class="btn btn-danger btn-block" type="submit" formaction="/clear_search" style="height: 47px; margin-top: 10px;">Clear search</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>