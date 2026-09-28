@extends('backend.layouts.master')

@section('content')
<div class="dashboard-main-body">
    <!-- Breadcrumb -->
    <div class="breadcrumb d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
        <div>
            <h1 class="fw-semibold mb-4 h6 text-primary-light">Contact Queries</h1>
            <div>
                <a href="{{ route('dashboard') }}" class="text-secondary-light hover-text-primary hover-underline">Dashboard</a>
                <span class="text-secondary-light">/ Contact Queries</span>
            </div>
        </div>
    </div>

    <!-- Data Table Card -->
    <div class="mt-24">
        <div class="card h-100">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table bordered-table mb-0 align-middle">
                        <thead class="thead-light">
                            <tr>
                                <th class="ps-4">ID</th>
                                <th>Name & Email</th>
                                <th>Course</th>
                               
                                <th>Message Preview</th>
                               
                                <th>Date</th>
                              
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($queries as $query)
                                <tr>
                                   <td class="ps-4 fw-medium text-secondary-light">{{ $loop->iteration }}</td>
                                    <td>
                                        <div class="d-flex flex-column">
                                            <span class="fw-semibold text-dark">{{ $query->name ?? 'N/A' }}</span>
                                            <small class="text-muted">{{ $query->email ?? 'N/A' }}</small>
                                            @if(!empty($query->phone))
                                                <small class="text-muted"><i class="ri-phone-line me-1"></i>{{ $query->phone }}</small>
                                            @endif
                                        </div>
                                    </td>
                                    <td class="ps-4 fw-medium text-secondary-light">{{ $query->course }}</td>

                                   
                                    <td>
                                        <p class="mb-0 text-muted text-truncate" style="max-width: 250px;" title="{{ $query->message }}">
                                            {{ Str::limit($query->message, 50) }}
                                        </p>
                                    </td>
                                 
                                    <td class="text-secondary-light">
                                        {{ $query->created_at->format('d M, Y') }}
                                    </td>
                                  
                                </tr>

                              
                            @empty
                                <!-- Empty State Handling -->
                                <tr>
                                    <td colspan="7" class="text-center py-5">
                                        <div class="d-flex flex-column align-items-center text-muted">
                                            <i class="ri-inbox-line display-4 mb-3 opacity-50"></i>
                                            <h6 class="fw-semibold mb-1">No Contact Queries Found</h6>
                                            <p class="small mb-0">There are currently no queries in the database.</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

               
            </div>
        </div>
    </div>
</div>
@endsection