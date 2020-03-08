3 bước quan trọng để liên kết page:
File--->controller-->routes

câu lệnh tạo controller
---> php artisan make:controller name

câu lệnh tạo table database ở migration cho việc đăng nhập
---> php artisan make:migration create_tbl_admin_table --create=tbl_admin

câu lệnh thực thi table đẩy lên database mysql:
---> php artisan migrate   ---> enter