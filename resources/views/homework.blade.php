<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-3">
                                <h1>งานและการบ้าน</h1>
                            </div>
                        </div>
                        <div class="row">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col"><h4>ข้อมูลงานการบ้าน</h4></th>
                                        <th><button type="button" class="btn btn-success">+เพิ่มการบ้าน</button></th>
                                        <th><button type="button" class="btn btn-secondary">สรุปคะแนน</button></th>
                                    </tr>
                                  <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">ชื่องาน</th>
                                    <th scope="col">คะแนนเต็ม</th>
                                    <th scope="col">ช่วงกำหนดเวลา</th>
                                    <th scope="col">สร้างเมื่อ</th>
                                    <th scope="col">ทำเสร็จแล้ว</th>
                                    <th scope="col">กำลังทำ</th>
                                    <th scope="col">ยังไม่เริ่มทำ</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <th scope="row"></th>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                  </tr>
                                </tbody>
                              </table>
                        </div>
                        <div class="row">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col"><h4>เช็คชื่อเข้าเรียน</h4></th>
                                    </tr>
                                  <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">เรื่อง/งาน</th>
                                    <th scope="col">เข้าเรียน(คน)</th>
                                    <th scope="col">ช่วงเวลาที่เช็ค</th>
                                    <th scope="col">สร้างเมื่อ</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                  </tr>

                                </tbody>
                              </table>
                        </div>
                    {{-- Body --}}
                    <!-- Button trigger modal -->

                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
