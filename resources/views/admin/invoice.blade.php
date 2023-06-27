@extends('core.core')
@section('title')
    Invoice
@endsection
@section('content')
<style>
body{margin-top:20px;
background-color:#eee;
}

.card {
    box-shadow: 0 20px 27px 0 rgb(0 0 0 / 5%);
}
.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 0 solid rgba(0,0,0,.125);
    border-radius: 1rem;
}
</style>
<div class="container">
    <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="invoice-title">
                            <h4 class="float-end font-size-15">Invoice {{ $invoice->id }}</h4>
                            <div class="mb-4">
                               <h2 class="mb-1 text-muted">Rumah Sakit Tidak Peduli</h2>
                            </div>
                            <div class="text-muted">
                                <p class="mb-1">RS TP</p>
                                <p class="mb-1"><i class="uil uil-envelope-alt me-1"></i> rumahsakittidakpeduli@gmail.com</p>
                                <p><i class="uil uil-phone me-1"></i>+6281-574-999-858</p>
                            </div>
                        </div>

                        <hr class="my-4">

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="text-muted">
                                    <h5 class="font-size-16 mb-3">Billed To:</h5>
                                    <h5 class="font-size-15 mb-2">{{ $invoice->nama_pasien }}</h5>
                                    <p class="mb-1">{{ $invoice->pasien->alamat }}</p>
                                    <p class="mb-1"></p>
                                    <p>{{ $invoice->pasien->no_hp }}</p>
                                </div>
                            </div>
                            <!-- end col -->
                            <div class="col-sm-6">
                                <div class="text-muted text-sm-end">
                                    <div>
                                        <h5 class="font-size-15 mb-1">Invoice No:</h5>
                                        <p>{{ $invoice->id }}</p>
                                    </div>
                                    <div class="mt-4">
                                        <h5 class="font-size-15 mb-1">Invoice Date:</h5>
                                        <p>{{ $invoice->created_at }}</p>
                                    </div>

                                </div>
                            </div>
                            <!-- end col -->
                        </div>
                        <!-- end row -->

                        <div class="py-2">


                            <div class="table-responsive">
                                <table class="table align-middle table-nowrap table-centered mb-0">
                                    <thead>
                                        <tr>
                                            <th style="width: 70px;">No.</th>
                                            <th>Item</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th class="text-end" style="width: 120px;">Total</th>
                                        </tr>
                                    </thead><!-- end thead -->
                                    <tbody>
                                        <tr>
                                            <th scope="row">01</th>
                                            <td>
                                                <div>
                                                    <h5 class="text-truncate font-size-14 mb-1">{{ $invoice->kamar->nama_kamar }}</h5>
                                                    <p class="text-muted mb-0">/hari</p>
                                                </div>
                                            </td>
                                            <td>{{ number_format($invoice->kamar->harga.'000',2,',','.') }}</td>
                                            <td>{{ $invoice->hari }}</td>
                                            <td class="text-end">{{ number_format($invoice->kamar->harga * $invoice->hari.'000',2,',','.') }}</td>
                                        </tr>
                                        <!-- end tr -->
                                        <tr>
                                            <th scope="row">02</th>
                                            <td>
                                                <div>
                                                    <h5 class="text-truncate font-size-14 mb-1">Check-up</h5>
                                                    <p class="text-muted mb-0">/hari</p>
                                                </div>
                                            </td>
                                            <td>
                                                @foreach ($perkembangan->visit as $checkup)

                                                <p>{{  number_format($checkup->harga_checkup.'000',2,',','.') }}</p>
                                                @endforeach

                                            </td>
                                            <td>{{ $invoice->hari }}</td>
                                            <td class="text-end">{{ number_format($invoice->total_checkup_perhari.'000',2,',','.') }}</td>
                                        </tr>
                                        <!-- end tr -->
                                        <tr>
                                            <th scope="row">02</th>
                                            <td>
                                                <div>
                                                    <h5 class="text-truncate font-size-14 mb-1">Obat</h5>
                                                    <p class="text-muted mb-0">/hari</p>
                                                </div>
                                            </td>
                                            <td>
                                                @foreach ($perkembangan->visit as $obat)
                                                <div class="row">

                                                    <div class="col-md-5">

                                                        {{  $obat->obat }}
                                                    </div>
                                                    <div class="col-md-1">:</div>
                                                    <div class="col-md-6">{{ number_format($obat->harga_obat_ori.'000',2,',','.') }}</div>
                                                </div>
                                                @endforeach

                                            </td>

                                            <td>-</td>
                                            <td class="text-end">{{ number_format($invoice->total_obat_perhari.'000',2,',','.') }}</td>
                                        </tr>
                                        <!-- end tr -->
                                        <tr>
                                            <th scope="row" colspan="4" class="text-end">Sub Total</th>
                                            <td class="text-end">{{ number_format($invoice->total.'000',2,',','.') }}</td>
                                        </tr>
                                        <!-- end tr -->
                                        <tr>
                                            <th scope="row" colspan="4" class="border-0 text-end">
                                                BPJS :</th>
                                            <td class="border-0 text-end">No</td>
                                        </tr>
                                        <tr>
                                            <th scope="row" colspan="4" class="border-0 text-end">
                                                Potongan BPJS :</th>
                                            <td class="border-0 text-end">0</td>
                                        </tr>
                                        <!-- end tr -->

                                        <!-- end tr -->

                                        <!-- end tr -->
                                        <tr>
                                            <th scope="row" colspan="4" class="border-0 text-end">Total</th>
                                            <td class="border-0 text-end"><h4 class="m-0 fw-semibold">{{ number_format($invoice->total.'000',2,',','.') }}</h4></td>
                                        </tr>
                                        <!-- end tr -->
                                    </tbody><!-- end tbody -->
                                </table><!-- end table -->
                            </div><!-- end table responsive -->
                            <div class="d-print-none mt-4">
                                <div class="float-end">
                                    <a href="javascript:window.print()" class="btn btn-success me-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-printer" viewBox="0 0 16 16">
                                            <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>
                                            <path d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2H5zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4V3zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2H5zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z"/>
                                        </svg>
                                    </a>
                                    <a href="{{ URL::previous() }}" class="btn btn-primary w-md">back</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- end col -->
        </div>
    </div>
@endsection
