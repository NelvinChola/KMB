@extends('layouts.adminLayout.blade')

@section('content')
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="mb-0">Music Management</h4>
                <button class="btn btn-primary"><i class="fas fa-plus me-2"></i> Add New Track</button>
            </div>

            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-header bg-white d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">Filters</h5>
                            <button class="btn btn-sm btn-link">Reset</button>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label">Genre</label>
                                <select class="form-select">
                                    <option selected>All Genres</option>
                                    <option>Afrobeat</option>
                                    <option>Kalindula</option>
                                    <option>Zed Hip Hop</option>
                                    <option>Gospel</option>
                                    <option>Zedbeat</option>
                                    <option>Uncategorized</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Status</label>
                                <select class="form-select">
                                    <option selected>All Status</option>
                                    <option>Published</option>
                                    <option>Pending</option>
                                    <option>Draft</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Artist</label>
                                <select class="form-select">
                                    <option selected>All Artists</option>
                                    <option>K'Millian</option>
                                    <option>Jay Rox</option>
                                    <option>Mampi</option>
                                    <option>Slap Dee</option>
                                    <option>Chef 187</option>
                                </select>
                            </div>
                            <button class="btn btn-primary w-100">Apply Filters</button>
                        </div>
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header bg-white d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">All Music Tracks</h5>
                            <div class="input-group w-50">
                                <input type="text" class="form-control" placeholder="Search tracks...">
                                <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Title</th>
                                            <th>Artist</th>
                                            <th>Genre</th>
                                            <th>Downloads</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Sunset Groove</td>
                                            <td>Jay Rox</td>
                                            <td>Afrobeat</td>
                                            <td>24,587</td>
                                            <td><span class="badge bg-success">Published</span></td>
                                            <td>
                                                <button class="btn btn-sm btn-outline-primary me-1"><i class="fas fa-edit"></i></button>
                                                <button class="btn btn-sm btn-outline-danger"><i class="fas fa-trash"></i></button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>African Queen</td>
                                            <td>Mampi</td>
                                            <td>Zed Hip Hop</td>
                                            <td>19,842</td>
                                            <td><span class="badge bg-success">Published</span></td>
                                            <td>
                                                <button class="btn btn-sm btn-outline-primary me-1"><i class="fas fa-edit"></i></button>
                                                <button class="btn btn-sm btn-outline-danger"><i class="fas fa-trash"></i></button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Copper Rhythm</td>
                                            <td>Slap Dee</td>
                                            <td>Kalindula</td>
                                            <td>15,673</td>
                                            <td><span class="badge bg-success">Published</span></td>
                                            <td>
                                                <button class="btn btn-sm btn-outline-primary me-1"><i class="fas fa-edit"></i></button>
                                                <button class="btn btn-sm btn-outline-danger"><i class="fas fa-trash"></i></button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Zambeat</td>
                                            <td>Chef 187</td>
                                            <td>Zedbeat</td>
                                            <td>12,459</td>
                                            <td><span class="badge bg-success">Published</span></td>
                                            <td>
                                                <button class="btn btn-sm btn-outline-primary me-1"><i class="fas fa-edit"></i></button>
                                                <button class="btn btn-sm btn-outline-danger"><i class="fas fa-trash"></i></button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Copper Sun</td>
                                            <td>K'Millian</td>
                                            <td>Afrobeat</td>
                                            <td>11,842</td>
                                            <td><span class="badge bg-success">Published</span></td>
                                            <td>
                                                <button class="btn btn-sm btn-outline-primary me-1"><i class="fas fa-edit"></i></button>
                                                <button class="btn btn-sm btn-outline-danger"><i class="fas fa-trash"></i></button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Kalindula Nights</td>
                                            <td>Amanay</td>
                                            <td>Kalindula</td>
                                            <td>9,673</td>
                                            <td><span class="badge bg-warning text-dark">Pending</span></td>
                                            <td>
                                                <button class="btn btn-sm btn-outline-primary me-1"><i class="fas fa-edit"></i></button>
                                                <button class="btn btn-sm btn-outline-danger"><i class="fas fa-trash"></i></button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer bg-white">
                            <nav aria-label="Page navigation">
                                <ul class="pagination justify-content-center mb-0">
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#">Previous</a>
                                    </li>
                                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">Next</a>
                                    </li>
                                    </ul>
                            </nav>
                            <div class="text-center mt-2">
                                <small class="text-muted">Showing 1 to 6 of 247 results</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection