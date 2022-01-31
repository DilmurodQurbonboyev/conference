@extends('admin.layouts.app')

@section('title')
    {{ tr('Update Appeal') }}
@endsection
@section('header')
    <div class="col-sm-6">
        <h1>{{ tr('Update Appeal') }}</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            {{ Breadcrumbs::render('appeals/edit', $appeal->id) }}
        </ol>
    </div>
@endsection

@section('content')
    <div class="card card-primary card-outline">
        <div class="card-body p-0">
            <div class="mailbox-read-message">
                <table class="table table-striped table-hover">
                    <tbody>
                    <tr>
                        <td>{{ tr('Id') }}</td>
                        <th scope="row">{{ $appeal->id }}</th>
                    </tr>
                    <tr>
                        <td>{{ tr('Name of the applicant bank (parent bank)') }}</td>
                        <th scope="row">{{ $appeal->name }}</th>
                    </tr>
                    <tr>
                        <td>{{ tr('TIN of the bank') }}</td>
                        <th scope="row">{{ $appeal->inn }}</th>
                    </tr>
                    <tr>
                        <td>{{ tr('Address of the bank') }}</td>
                        <th scope="row">{{ $appeal->address }}</th>
                    </tr>
                    <tr>
                        <td>{{ tr('Legal entity or SP') }}</td>
                        <th scope="row">{{ $appeal->person }}</th>
                    </tr>
                    <tr>
                        <td>{{ tr('Legal entity or SP TIN') }}</td>
                        <th scope="row">{{ $appeal->person_inn }}</th>
                    </tr>
                    <tr>
                        <td>{{ tr('Legal entity or SP address') }}</td>
                        <th scope="row">{{ $appeal->person_address }}</th>
                    </tr>
                    <tr>
                        <td>{{ tr('Name of the project') }}</td>
                        <th scope="row">{{ $appeal->project }}</th>
                    </tr>
                    <tr>
                        <td>{{ tr('Project amount') }}</td>
                        <th scope="row">{{ $appeal->project_price }}</th>
                    </tr>
                    {{--  --}}
                    <tr>
                        <td>{{ tr('Other information') }}</td>
                        <th scope="row">{{ $appeal->additional_info }}</th>
                    </tr>
                    <tr>
                        <td>{{ tr('The telephone number of the applicant bank') }}</td>
                        <th scope="row">{{ $appeal->bank_number }}</th>
                    </tr>
                    <tr>
                        <td>{{ tr('Bank e-mail E-mail') }}</td>
                        <th scope="row">{{ $appeal->bank_email }}</th>
                    </tr>
                    <tr>
                        <td>{{ tr('Status') }}</td>
                        <th scope="row">
                            @if ($appeal->status == 2)
                                <span class="badge bg-success p-2">{{ tr('Active') }}</span>
                            @else
                                <span class="badge bg-danger p-2">{{ tr('Inactive') }}</span>
                            @endif
                        </th>
                    </tr>
                    <tr>
                        <td>{{ tr('Created At') }}</td>
                        <th scope="row">{{ $appeal->created_at->format('d.m.20y') }}</th>
                    </tr>
                    <tr>
                        <td>{{ tr('Updated At') }}</td>
                        <th scope="row">{{ $appeal->updated_at->format('d.m.20y') }}</th>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-12 my-2">
                <form action="{{ route('appeals.update', $appeal->id) }}" method="post">
                    @csrf
                    @method('patch')
                    <div class="form-group">
                        <label for="status">{{ tr('Status') }}</label>
                        <select class="custom-select rounded-0 select2" name="status" id="status">
                            <option value="2" {{ $appeal->status == '2' ? 'selected' : '' }}>{{ tr('Active') }}
                            </option>
                            <option value="1" {{ $appeal->status == '1' ? 'selected' : '' }}>{{ tr('Inactive') }}
                            </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">{{ tr('Update') }}</button>
                    </div>
                </form>
            </div>
            <!-- /.mailbox-read-message -->
        </div>
        <!-- /.card-body -->
        <div class="card-footer bg-white">
            <ul class="mailbox-attachments d-flex align-items-stretch clearfix">
                {{-- first --}}
                @if ($appeal->short_info)
                    @if (pathinfo(public_path($appeal->short_info))['extension'] == 'docx')
                        <li>
                            <span class="mailbox-attachment-icon">
                                <i class="far fa-file-word"></i>
                            </span>
                            <div class="mailbox-attachment-info">
                                <a href="{{ asset($appeal->short_info) }}" class="mailbox-attachment-name">
                                    <i class="fas fa-paperclip"></i>
                                    {{ $appeal->short_info }}
                                </a>
                                <span class="mailbox-attachment-size clearfix mt-1">
                                    <a href="{{ asset($appeal->short_info) }}"
                                       class="btn btn-default btn-sm float-right">
                                        <i class="fas fa-download"></i></a>
                                </span>
                            </div>
                        </li>
                    @elseif (pathinfo(public_path($appeal->short_info))['extension'] == 'pdf')
                        <li>
                            <span class="mailbox-attachment-icon"><i class="far fa-file-pdf"></i></span>

                            <div class="mailbox-attachment-info">
                                <a href="{{ asset($appeal->short_info) }}" class="mailbox-attachment-name">
                                    <i class="fas fa-paperclip"></i>
                                    {{ $appeal->short_info }}</a>
                                <span class="mailbox-attachment-size clearfix mt-1">
                                    <a href="{{ asset($appeal->short_info) }}"
                                       class="btn btn-default btn-sm float-right">
                                        <i class="fas fa-download"></i></a>
                                </span>
                            </div>
                        </li>
                    @endif
                @endif
                {{-- second --}}
                @if ($appeal->energy_save)
                    @if (pathinfo(public_path($appeal->energy_save))['extension'] == 'docx')
                        <li>
                            <span class="mailbox-attachment-icon">
                                <i class="far fa-file-word"></i>
                            </span>
                            <div class="mailbox-attachment-info">
                                <a href="{{ asset($appeal->energy_save) }}" class="mailbox-attachment-name">
                                    <i class="fas fa-paperclip"></i>
                                    {{ $appeal->energy_save }}
                                </a>
                                <span class="mailbox-attachment-size clearfix mt-1">
                                    <a href="{{ asset($appeal->energy_save) }}"
                                       class="btn btn-default btn-sm float-right">
                                        <i class="fas fa-download"></i></a>
                                </span>
                            </div>
                        </li>
                    @elseif (pathinfo(public_path($appeal->energy_save))['extension'] == 'pdf')
                        <li>
                            <span class="mailbox-attachment-icon"><i class="far fa-file-pdf"></i></span>

                            <div class="mailbox-attachment-info">
                                <a href="{{ asset($appeal->energy_save) }}" class="mailbox-attachment-name">
                                    <i class="fas fa-paperclip"></i>
                                    {{ $appeal->energy_save }}</a>
                                <span class="mailbox-attachment-size clearfix mt-1">
                                    <a href="{{ asset($appeal->energy_save) }}"
                                       class="btn btn-default btn-sm float-right">
                                        <i class="fas fa-download"></i></a>
                                </span>
                            </div>
                        </li>
                    @endif
                @endif
                {{-- third --}}
                @if ($appeal->other_info)
                    @if (pathinfo(public_path($appeal->other_info))['extension'] == 'docx')
                        <li>
                            <span class="mailbox-attachment-icon">
                                <i class="far fa-file-word"></i>
                            </span>
                            <div class="mailbox-attachment-info">
                                <a href="{{ asset($appeal->other_info) }}" class="mailbox-attachment-name">
                                    <i class="fas fa-paperclip"></i>
                                    {{ $appeal->other_info }}
                                </a>
                                <span class="mailbox-attachment-size clearfix mt-1">
                                    <a href="{{ asset($appeal->other_info) }}"
                                       class="btn btn-default btn-sm float-right">
                                        <i class="fas fa-download"></i></a>
                                </span>
                            </div>
                        </li>
                    @elseif (pathinfo(public_path($appeal->other_info))['extension'] == 'pdf')
                        <li>
                            <span class="mailbox-attachment-icon"><i class="far fa-file-pdf"></i></span>

                            <div class="mailbox-attachment-info">
                                <a href="{{ asset($appeal->other_info) }}" class="mailbox-attachment-name">
                                    <i class="fas fa-paperclip"></i>
                                    {{ $appeal->other_info }}</a>
                                <span class="mailbox-attachment-size clearfix mt-1">
                                    <a href="{{ asset($appeal->other_info) }}"
                                       class="btn btn-default btn-sm float-right">
                                        <i class="fas fa-download"></i></a>
                                </span>
                            </div>
                        </li>
                    @endif
                @endif
                {{-- fourth --}}
                @if ($appeal->confirm_info)
                    @if (pathinfo(public_path($appeal->confirm_info))['extension'] == 'docx')
                        <li>
                            <span class="mailbox-attachment-icon">
                                <i class="far fa-file-word"></i>
                            </span>
                            <div class="mailbox-attachment-info">
                                <a href="{{ asset($appeal->confirm_info) }}" class="mailbox-attachment-name">
                                    <i class="fas fa-paperclip"></i>
                                    {{ $appeal->confirm_info }}
                                </a>
                                <span class="mailbox-attachment-size clearfix mt-1">
                                    <a href="{{ asset($appeal->confirm_info) }}"
                                       class="btn btn-default btn-sm float-right">
                                        <i class="fas fa-download"></i></a>
                                </span>
                            </div>
                        </li>
                    @elseif (pathinfo(public_path($appeal->confirm_info))['extension'] == 'pdf')
                        <li>
                            <span class="mailbox-attachment-icon"><i class="far fa-file-pdf"></i></span>

                            <div class="mailbox-attachment-info">
                                <a href="{{ asset($appeal->confirm_info) }}" class="mailbox-attachment-name">
                                    <i class="fas fa-paperclip"></i>
                                    {{ $appeal->confirm_info }}</a>
                                <span class="mailbox-attachment-size clearfix mt-1">
                                    <a href="{{ asset($appeal->confirm_info) }}"
                                       class="btn btn-default btn-sm float-right">
                                        <i class="fas fa-download"></i></a>
                                </span>
                            </div>
                        </li>
                    @endif
                @endif
            </ul>
        </div>
    </div>
@endsection
