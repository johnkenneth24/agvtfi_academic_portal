<div class="row">
    <div class="col-md-12">
        <form action="{{ request()->url() }}" method="GET">
            <x-card title="Filter">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Select location:</label>
                            <div class="input-group">
                                <select name="brgy" class="form-control">
                                    <option value="">-- Please select --</option>
                                    @foreach($barangays as $brgy)
                                        @if(isset($brgy->meta['barangay_text']))
                                            <option value="{{ $brgy->barangay }}">{{ $brgy->meta['barangay_text'] }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-primary">Load</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </x-card>
        </form>
    </div>
</div>
