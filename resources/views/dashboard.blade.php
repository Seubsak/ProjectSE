@extends('layouts.checklab')
@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="container-fluid">
                        {{-- Body --}}
                        <!-- Button to open the "Add Course" modal -->
                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            เพิ่มวิชา
                        </button>

                        <!-- Modal for Editing Course -->
                        @foreach ($coures as $course)
                        <div class="modal fade" id="EditModal_{{ $course->course_id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">แก้ไขวิชา</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" action="{{ route('dashboard.courseEdit') }}">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="recipient-name" class="col-form-label">รหัสวิชา:</label>
                                                <input name="id" type="text" class="form-control" value="{{ $course->course_code }}" id="recipient-name" readonly>
                                            </div>
                                            <div class="mb-3">
                                                <label for="recipient-name" class="col-form-label">ชื่อวิชา:</label>
                                                <input name="name" type="text" class="form-control" value="{{ $course->course_name }}" id="recipient-name">
                                            </div>
                                            <div class="mb-3">
                                                <label for="message-text" class="col-form-label">รายละเอียดวิชา:</label>
                                                <textarea name="info" class="form-control" id="message-text">{{ $course->course_desc }}</textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label for="recipient-name" class="col-form-label">ภาค:</label>
                                                <input name="term" type="number" class="form-control" value="{{ $course->course_term }}" id="recipient-name">
                                            </div>
                                            <div class="mb-3">
                                                <label for "recipient-name" class="col-form-label">ปีการศึกษา:</label>
                                                <input name="year" type="text" class="form-control" value="{{ $course->course_year }}" id="recipient-name">
                                            </div>
                                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                </form>
                                </div>
                            </div>
                        </div>
                        @endforeach


                        <!-- Modal for Adding Course -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">เพิ่มวิชา</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" action="{{ route('dashboard.create') }}">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="recipient-name" class="col-form-label">รหัสวิชา:</label>
                                                <input name="id" type="text" class="form-control" id="recipient-name">
                                            </div>
                                            <div class="mb-3">
                                                <label for="recipient-name" class="col-form-label">ชื่อวิชา:</label>
                                                <input name="name" type="text" class="form-control" id="recipient-name">
                                            </div>
                                            <div class="mb-3">
                                                <label for="message-text" class="col-form-label">รายละเอียดวิชา:</label>
                                                <textarea name="info" class="form-control" id="message-text"></textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label for="recipient-name" class="col-form-label">ภาค:</label>
                                                <input name="term" type="number" class="form-control" id="recipient-name">
                                            </div>
                                            <div class="mb-3">
                                                <label for="recipient-name" class="col-form-label">ปีการศึกษา:</label>
                                                <input name="year" type="text" class="form-control" id="recipient-name">
                                            </div>
                                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Add course</button>
                                    </div>
                                </form>
                                </div>
                            </div>
                        </div>

                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">ชื่อวิชา</th>
                                    <th scope="col">ภาค/ปีการศึกษา</th>
                                    <th scope="col">สร้างเมื่อ</th>
                                </tr>
                            </thead>
                            @foreach($coures as $course)
                            @if($course->id == Auth::user()->id)
                            <tbody>
                                <tr>
                                    <td><a href="/course/detail/{{ $course->course_id }}">{{ $course->course_code }} {{ $course->course_name }}</a></td>
                                    <td>{{ $course->course_term }}/{{ $course->course_year }}</td>
                                    <td>{{ $course->created_at }}</td>
                                    <td>
                                        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#EditModal_{{ $course->course_id }}">
                                            <i class="bi bi-pencil-square"></i> Edit
                                        </button>
                                    </td>
                                    <td><a href="/course/delete/{{ $course->course_id }}"><button type="button" class="btn btn-danger" onclick="return confirm('คุณจะลบวิชานี้จริงหรือไม่?')"><i class="bi bi-trash"></i>Delete</button></a></td>
                                </tr>
                            </tbody>
                            @endif
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
