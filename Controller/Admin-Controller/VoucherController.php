<?php
require_once './models/Voucher.php';

class VoucherController {
    private $voucherModel;

    public function __construct() {
        $this->voucherModel = new Voucher();
    }

    public function index() {
        $vouchers = $this->voucherModel->getAll();
        include './views/Admin/Voucher/index.php';
    }

    public function add() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['addVoucher'])) {
            // Kiểm tra và lấy dữ liệu an toàn
            $data = [
                'MaVoucher' => strtoupper(trim($_POST['MaVoucher'] ?? '')),
                'TenVoucher' => trim($_POST['TenVoucher'] ?? ''),
                'MoTa' => trim($_POST['MoTa'] ?? ''),
                'LoaiGiamGia' => $_POST['LoaiGiamGia'] ?? '',
                'GiaTriGiamGia' => (float)($_POST['GiaTriGiamGia'] ?? 0),
                'SoLuong' => (int)($_POST['SoLuong'] ?? 1),
                'NgayBatDau' => $_POST['NgayBatDau'] ?? '',
                'NgayKetThuc' => $_POST['NgayKetThuc'] ?? '',
                'TrangThai' => (int)($_POST['TrangThai'] ?? 1)
            ];

            // Validation
            $errors = $this->validateVoucherData($data);
            
            if (empty($errors)) {
                // Chuyển đổi định dạng ngày từ datetime-local về MySQL datetime
                if (!empty($data['NgayBatDau'])) {
                    $data['NgayBatDau'] = date('Y-m-d H:i:s', strtotime($data['NgayBatDau']));
                }
                if (!empty($data['NgayKetThuc'])) {
                    $data['NgayKetThuc'] = date('Y-m-d H:i:s', strtotime($data['NgayKetThuc']));
                }
                
                // Kiểm tra mã voucher đã tồn tại chưa
                $existingVoucher = $this->voucherModel->getByCode($data['MaVoucher']);
                if ($existingVoucher) {
                    $errors[] = 'Mã voucher đã tồn tại, vui lòng chọn mã khác.';
                } else {
                    if ($this->voucherModel->addVoucher($data)) {
                        header('Location: ?controller=voucher&action=index');
                        exit;
                    } else {
                        $errors[] = 'Có lỗi xảy ra khi thêm voucher.';
                    }
                }
            }
        }

        include './views/Admin/Voucher/add.php';
    }

    public function edit() {
        $id = $_GET['id'] ?? null;
        $errors = [];
        
        if ($id) {
            $voucher = $this->voucherModel->getById($id);
            if (!$voucher) {
                header('Location: ?controller=voucher&action=index');
                exit;
            }
            
            // Xử lý cập nhật voucher khi form được submit
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['updateVoucher'])) {
                $data = [
                    'ID' => (int)($id),
                    'MaVoucher' => strtoupper(trim($_POST['MaVoucher'] ?? '')),
                    'TenVoucher' => trim($_POST['TenVoucher'] ?? ''),
                    'MoTa' => trim($_POST['MoTa'] ?? ''),
                    'LoaiGiamGia' => $_POST['LoaiGiamGia'] ?? '',
                    'GiaTriGiamGia' => (float)($_POST['GiaTriGiamGia'] ?? 0),
                    'SoLuong' => (int)($_POST['SoLuong'] ?? 1),
                    'NgayBatDau' => $_POST['NgayBatDau'] ?? '',
                    'NgayKetThuc' => $_POST['NgayKetThuc'] ?? '',
                    'TrangThai' => (int)($_POST['TrangThai'] ?? 1)
                ];

                // Validation
                $errors = $this->validateVoucherData($data);
                
                if (empty($errors)) {
                    // Chuyển đổi định dạng ngày từ datetime-local về MySQL datetime
                    if (!empty($data['NgayBatDau'])) {
                        $data['NgayBatDau'] = date('Y-m-d H:i:s', strtotime($data['NgayBatDau']));
                    }
                    if (!empty($data['NgayKetThuc'])) {
                        $data['NgayKetThuc'] = date('Y-m-d H:i:s', strtotime($data['NgayKetThuc']));
                    }
                    
                    // Kiểm tra mã voucher đã tồn tại chưa (trừ voucher hiện tại)
                    $existingVoucher = $this->voucherModel->getByCode($data['MaVoucher']);
                    if ($existingVoucher && $existingVoucher['ID'] != $data['ID']) {
                        $errors[] = 'Mã voucher đã tồn tại, vui lòng chọn mã khác.';
                    } else {
                        if ($this->voucherModel->updateVoucher($data)) {
                            header('Location: ?controller=voucher&action=index');
                            exit;
                        } else {
                            $errors[] = 'Có lỗi xảy ra khi cập nhật voucher.';
                        }
                    }
                }
                
                // Nếu có lỗi, cập nhật dữ liệu voucher với dữ liệu từ form
                if (!empty($errors)) {
                    $voucher = array_merge($voucher, $data);
                }
            }
            
            include './views/Admin/Voucher/edit.php';
        } else {
            header('Location: ?controller=voucher&action=index');
            exit;
        }
    }



    public function show() {
        $id = $_GET['id'] ?? null;
        if ($id) {
            $voucher = $this->voucherModel->getById($id);
            include './views/Admin/Voucher/show.php';
        } else {
            header('Location: ?controller=voucher&action=index');
            exit;
        }
    }

    public function delete() {
        $id = $_GET['id'] ?? null;
        if ($id) {
            $this->voucherModel->deleteVoucher($id);
        }
        header('Location: ?controller=voucher&action=index');
        exit;
    }

    private function validateVoucherData($data) {
        $errors = [];

        // Kiểm tra mã voucher
        if (empty($data['MaVoucher'])) {
            $errors[] = 'Mã voucher không được để trống.';
        } elseif (strlen($data['MaVoucher']) < 3) {
            $errors[] = 'Mã voucher phải có ít nhất 3 ký tự.';
        }

        // Kiểm tra tên voucher
        if (empty($data['TenVoucher'])) {
            $errors[] = 'Tên voucher không được để trống.';
        }

        // Kiểm tra loại giảm giá
        if (empty($data['LoaiGiamGia']) || !in_array($data['LoaiGiamGia'], ['phantram', 'tienmat'])) {
            $errors[] = 'Vui lòng chọn loại giảm giá hợp lệ.';
        }

        // Kiểm tra giá trị giảm giá
        if ($data['GiaTriGiamGia'] <= 0) {
            $errors[] = 'Giá trị giảm giá phải lớn hơn 0.';
        }

        // Kiểm tra giá trị giảm giá theo loại
        if ($data['LoaiGiamGia'] == 'phantram' && $data['GiaTriGiamGia'] > 100) {
            $errors[] = 'Giảm giá theo phần trăm không được vượt quá 100%.';
        }

        // Kiểm tra số lượng
        if ($data['SoLuong'] <= 0) {
            $errors[] = 'Số lượng voucher phải lớn hơn 0.';
        }

        // Kiểm tra ngày
        if (empty($data['NgayBatDau'])) {
            $errors[] = 'Ngày bắt đầu không được để trống.';
        } else {
            // Validate định dạng ngày
            $dateBatDau = DateTime::createFromFormat('Y-m-d\TH:i', $data['NgayBatDau']);
            if (!$dateBatDau) {
                $errors[] = 'Định dạng ngày bắt đầu không hợp lệ.';
            }
        }
        
        if (empty($data['NgayKetThuc'])) {
            $errors[] = 'Ngày kết thúc không được để trống.';
        } else {
            // Validate định dạng ngày
            $dateKetThuc = DateTime::createFromFormat('Y-m-d\TH:i', $data['NgayKetThuc']);
            if (!$dateKetThuc) {
                $errors[] = 'Định dạng ngày kết thúc không hợp lệ.';
            }
        }
        
        if (!empty($data['NgayBatDau']) && !empty($data['NgayKetThuc'])) {
            $timestampBatDau = strtotime($data['NgayBatDau']);
            $timestampKetThuc = strtotime($data['NgayKetThuc']);
            
            if ($timestampBatDau === false || $timestampKetThuc === false) {
                $errors[] = 'Định dạng ngày tháng không hợp lệ.';
            } elseif ($timestampBatDau >= $timestampKetThuc) {
                $errors[] = 'Ngày kết thúc phải sau ngày bắt đầu.';
            }
        }



        return $errors;
    }
}
