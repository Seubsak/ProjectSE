<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    @foreach ($course as $c)
    @foreach ($students as $std)
    @if($c->course_id == $std->course_id)
    <div class="modal fade" id="editModal_{{ $std->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">แก้ไขรายบุคคล</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('dashboard.EditStd') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">รหัสนักศึกษา:</label>
                            <input name="id" type="text" value="{{ $std->std }}" class="form-control" id="recipient-name" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">ชื่อ-นามสกุล:</label>
                            <input name="name" type="text" value="{{ $std->name }}" class="form-control" id="recipient-name">
                        </div>
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">อีเมล:</label>
                            <input name="email" type="email" value="{{ $std->email }}" class="form-control" id="recipient-name">
                        </div>
                        <input type="hidden" name="course_id" value="{{ $c->course_id }}">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                    <button type="submit" class="btn btn-success">บันทึก</button>
                </div>
            </form>
            </div>
        </div>
    </div>
    @endif
    @endforeach
    @endforeach
    @foreach ($course as $c)
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">นำเข้ารายบุคคล</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('dashboard.Addstd') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">รหัสนักศึกษา:</label>
                            <input name="id" type="text" class="form-control" id="recipient-name">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">ชื่อ-นามสกุล:</label>
                            <input name="name" type="text" class="form-control" id="recipient-name">
                        </div>
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">อีเมล:</label>
                            <input name="email" type="email" class="form-control" id="recipient-name">
                        </div>
                        <input type="hidden" name="course_id" value="{{ $c->course_id }}">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                    <button type="submit" class="btn btn-success">เพิ่ม</button>
                </div>
            </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="excelModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">นำเข้ารายบุคคล</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('import.excel') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="excel_file">เลือกไฟล์ Excel:</label>
                            <input type="file" name="excel_file" id="excel_file">
                        </div>
                        <button type="submit" class="btn btn-primary">นำเข้าไฟล์ Excel</button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                    <button type="submit" class="btn btn-success">เพิ่ม</button>
                </div>
            </form>
            </div>
        </div>
    </div>
    @endforeach
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="container-fluid">

                    {{-- Body --}}
                    <div class="card w-75 mb-3">
                        <div class="card-body">
                          <h4 class="card-title">ข้อมูลวิชา</h4>
                          @foreach ($course as $c)
                          <p class="card-text">รหัสวิชา:{{ $c->course_code }}</p>
                          <p class="card-text">ชื่อวิชา:{{ $c->course_name }}</p>
                          <p class="card-text">เทอม:{{ $c->course_term }}</p>
                          <p class="card-text">ปีการศึกษา:{{ $c->course_year }}</p>
                          <p class="card-text">คำอธิบายรายวิชา:{{ $c->course_desc }}</p>
                          @endforeach
                        </div>
                    </div>
                        <div class="card w-75 mb-3">
                            <div class="card-body">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#excelModal">นำเข้าไฟล์ Excel</button>
                                <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal">นำเข้ารายบุคคล</button>
                            <h4 class="card-title mt-3">รายชื่อนักศึกษา</h4>
                            <table class="table table-hover">
                                <thead>
                                  <tr>
                                    <th scope="col">รหัสนักศึกษา</th>
                                    <th scope="col">ชื่อ-นามสกุล</th>
                                    <th scope="col">อีเมล</th>
                                    <th scope="col">วันที่เพิ่ม</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @foreach ($course as $c)
                                    @foreach ($students as $std)
                                    @if($c->course_id == $std->course_id)
                                    <tr>
                                        <th scope="row">{{ $std->std }}</th>
                                        <td>{{ $std->name }}</td>
                                        <td>{{ $std->email }}</td>
                                        <td>{{ $std->created_at }}</td>
                                        <td>
                                            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editModal_{{ $std->id }}">
                                                <i class="bi bi-pencil-square"></i> Edit
                                            </button>
                                        </td>
                                        <td><a href="/course/deleteStudent/{{ $std->id }}"><button type="button" class="btn btn-danger" onclick="return confirm('คุณจะลบ {{ $std->name }} ออกจากรายวิชา {{ $c->course_name }} จริงหรือไม่?')"><i class="bi bi-trash"></i>Delete</button></a></td>
                                    </tr>
                                    @endif
                                    @endforeach
                                    @endforeach
                                </tbody>
                              </table>
                        </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

