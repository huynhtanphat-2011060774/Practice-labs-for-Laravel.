/* The above code is an HTML form that allows users to input scores for Math, Physics, and Chemistry
subjects, select an area, and then calculate and display the total points, rating, and priority
points based on the input values. */
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- Wrapper for the entire form -->
    <div id="wrapper">
        <!-- Heading for the form -->
        <h2>CLASSIFICATION OF STUDENT RESULTS</h2>
        <!-- Form for entering student scores -->
        <form action="#" method="post">
            <!-- Math score input -->
            <div class="row">
                <div class="LBlittle">
                    <label>Math scores</label>
                </div>
                <div class="LBlinput">
                    <!-- !: Điều chỉnh kiểu dữ liệu của input thành "number" để chỉ chấp nhận giá trị số. -->
                    <input type="number" name="math" value="<?php echo isset($_POST['math']) ? $_POST['math'] : "" ; ?>"/>
                </div>
            </div>
            <!-- Physics score input -->
            <div class="row">
                <div class="lbltitle">
                    <label>Physics scores</label>
                </div>
                <div class="lblinput">
                    <!-- !: Điều chỉnh kiểu dữ liệu của input thành "number" để chỉ chấp nhận giá trị số. -->
                    <input type="number" name="physics" value="<?php echo isset($_POST['physics']) ? $_POST['physics'] : "" ; ?>" />
                </div>
            </div>
            <!-- Chemistry score input -->
            <div class="row">
                <div class="lbltitle">
                    <label>Chemistry scores</label>
                </div>
                <div class="lblinput">
                    <!-- !: Điều chỉnh kiểu dữ liệu của input thành "number" để chỉ chấp nhận giá trị số. -->
                    <input type="number" name="chemistry" value="<?php echo isset($_POST['chemistry']) ? $_POST['chemistry'] : "" ; ?>" />
                </div>
            </div>
            <!-- Area selection dropdown -->
            <div class="row">
                <div class="lbltitle">
                    <label>Select an area</label>
                </div>
                <div class="lblinput">
                    <!-- ?: Hỏi liệu có cần phải cung cấp một chọn lựa vùng khác nhau cho sinh viên không? -->
                    <select name="khuvuc">
                        <option value="0" <?php echo isset($_POST['khuvuc']) && $_POST['khuvuc'] == '0' ? "selected" : "" ?>>Select an area</option>
                        <option value="1" <?php echo isset($_POST['khuvuc']) && $_POST['khuvuc'] == '1' ? "selected" : "" ?>>Area 1</option>
                        <option value="2" <?php echo isset($_POST['khuvuc']) && $_POST['khuvuc'] == '2' ? "selected" : "" ?>>Area 2</option>
                        <option value="3" <?php echo isset($_POST['khuvuc']) && $_POST['khuvuc'] == '3' ? "selected" : "" ?>>Area 3</option>
                        <option value="4" <?php echo isset($_POST['khuvuc']) && $_POST['khuvuc'] == '4' ? "selected" : "" ?>>Area 4</option>
                        <option value="5" <?php echo isset($_POST['khuvuc']) && $_POST['khuvuc'] == '5' ? "selected" : "" ?>>Area 5</option>
                    </select>
                </div>
            </div>
            <!-- Submit button to calculate ratings -->
            <div class="row">
                <div class="submit">
                    <!-- *: Tạo hành động tính toán xếp loại khi nhấn nút này. -->
                    <input type="submit" name="btnsubmit" value="Ratings" />
                </div>
            </div>
        </form>
        <!-- Displaying rating results -->
        <div class="result">
            <h2>Rating results</h2>
            <!-- Displaying total points -->
            <div class="row">
                <div class="lbltitle">
                    <label>Total points</label>
                </div>
                <div class="lbloutput">
                    <?php
                    // *: Hiển thị tổng điểm nếu biểu mẫu được gửi đi.
                    echo isset($_POST['btnsubmit']) ? $_POST['math'] + $_POST['physics'] + $_POST['chemistry'] : "" ;
                    ?>
                </div>
            </div>
            <!-- Displaying rating -->
            <div class="row">
                <div class="lbltitle">
                    <label>Rating</label>
                </div>
                <div class="lbloutput">
                    <?php
                    if(isset($_POST['btnsubmit'])){
                        // *: Tính tổng điểm và hiển thị xếp loại dựa trên điểm.
                        $totalpoints = $_POST['math'] + $_POST['physics'] + $_POST['chemistry'];
                        if($totalpoints >= 24) echo "Very Good";
                        elseif($totalpoints >= 21) echo "Good";
                        elseif($totalpoints >= 15) echo "Average";
                        else echo "Weak";
                    }
                    ?>
                </div>
            </div>
            <!-- Displaying priority points -->
            <div class="row">
                <div class="ibtitle">
                    <label>Priority points</label>
                </div>
                <div class="lbloutput">
                    <?php
                    if (isset($_POST['btnsubmit'])){
                        // *: Tính và hiển thị điểm ưu tiên dựa trên khu vực được chọn.
                        $priority_points = $_POST['khuvuc'];
                        switch ($priority_points){
                            case 0:
                            case 4:
                            case 5:
                                echo "0";
                                break;
                            case 1:
                            case 2:
                                echo "5";
                                break;
                            case 3:
                                echo "3";
                                break;
                            default:
                                echo "0";
                                break;
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
