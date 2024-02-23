<?php

App::import('Vendor', 'OpenAI', array('file' => 'OpenAI/vendor/autoload.php'));

use Orhanerday\OpenAi\OpenAi;

class OpenAIBehavior extends ModelBehavior {

    /**
     * Contain settings indexed by model name.
     *
     * @var array
     */
    private $__settings = array();
    private $__openai;
    private $__model = 'gpt-3.5-turbo';
    private $__context = "
                            Chuẩn đầu ra (CĐR) gồm 03 thành phần: Bắt đầu bằng Phần động từ (bắt buộc), Phần nội dung và phần điều kiện hoặc tiêu chí (không bắt buộc phải có)
                            Các nguyên tắc cần đảm bảo khi xây dựng CĐR:
                            - Bắt đầu bằng một động từ.
                            - Chỉ sử dụng một động từ cho một CĐR.
                            - KHÔNG sử dụng các động từ không đo lường được để viết CĐR bao gồm: Nắm vững, Nắm, Nắm được, Biết, Biết được, Hiểu, Hiểu được, Hiểu rõ, Học hỏi, Có kiến thức về, Làm quen với, Được tiếp xúc với, Cải thiện, Tiếp tục, Duy trì, Mở rộng, Tăng cường, Tối đa hóa, Có trình độ cao hơn.
                            - Đảm bảo rằng CĐR là thực tế và có khả năng đạt được.
                            - Đảm bảo rằng mỗi CĐR đều có thể đo được và quan sát được.
                            - Sử dụng ngôn ngữ cô đọng, súc tích, dễ hiểu.
                            Lưu ý:
                            - Nếu phần động từ có từ hai động từ trở lên thì cần xem xét tính liên kết giữa các động từ này.
                            - Nếu Nội dung là Declarative Knowledge: động từ được chọn sẽ nằm ở bậc thấp (Nhớ, Hiểu, và Áp dụng)
                            Declarative Knowledge là kiến thức về dữ kiện, sự kiện (factual knowledge), khái niệm (conceptual knowledge). 
                            Đây là kiến thức mà GV có thể dạy cho SV trên lớp hoặc SV tự nghiên cứu trên thư viện hoặc các nguồn tìm kiếm khác.
                            - Nếu Nội dung là Functioning Knowledge: động từ được chọn sẽ nằm ở bậc cao (Phân tích, Đánh giá, Sáng tạo)
                            Functioning Knowledge là kiến thức về phương pháp, quy trình (procedural knowledge), và siêu nhận thức (metacognitive knowledge). 
                            Đây là kiến thức mà SV có thể áp dụng vào công việc nghề nghiệp, trong giải quyết vấn đề, hoặc vận hành/thực hiện công việc hiệu quả (hơn) trong ngữ cảnh cụ thể.
                        ";

    public function setup(Model $model, $settings = array()) {

        $default = array(
            'model' => $this->__model,
            'messages' => [
                [
                    "role" => "system",
                    "content" => $this->__context
                ]
            ],
            'temperature' => 1.0,
            'max_tokens' => 2000,
            'frequency_penalty' => 0,
            'presence_penalty' => 0,
        );

        if (!isset($this->__settings[$model->alias])) {
            $this->__settings[$model->alias] = $default;
        }

        $this->__settings[$model->alias] = am($this->__settings[$model->alias], (is_array($settings) ? $settings : array()));
    }

    public function queryOpenAI(Model $model, $prompt) {
        $this->__openai = new OpenAi('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');
        $this->__settings[$model->alias]['messages'][] = array("role" => "user", "content" => $prompt);
        $chat = $this->__openai->chat($this->__settings[$model->alias]);
        $d = json_decode($chat);
        // Get Content
        return $d->choices[0]->message->content;
    }

}
