<div class="mb-6 p-6 bg-white rounded-2xl shadow-md border border-gray-200">
    <!-- Pertanyaan -->
    <label class="block text-sm font-semibold text-gray-700 mb-1">
        <i class="fas fa-question-circle text-blue-500 mr-1"></i> Pertanyaan
    </label>
    <input type="text" name="questions[{{ $index }}][question]" class="form-input w-full rounded-lg border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Pertanyaan" required>

    <!-- Pilihan Jawaban -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
        <div>
            <label class="text-sm font-medium text-gray-600">
                Pilihan A
            </label>
            <input type="text" name="questions[{{ $index }}][option_a]" class="form-input w-full rounded-lg border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="A" required>
        </div>
        <div>
            <label class="text-sm font-medium text-gray-600">
                Pilihan B
            </label>
            <input type="text" name="questions[{{ $index }}][option_b]" class="form-input w-full rounded-lg border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="B" required>
        </div>
        <div>
            <label class="text-sm font-medium text-gray-600">
                Pilihan C
            </label>
            <input type="text" name="questions[{{ $index }}][option_c]" class="form-input w-full rounded-lg border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="C" required>
        </div>
        <div>
            <label class="text-sm font-medium text-gray-600">
                Pilihan D
            </label>
            <input type="text" name="questions[{{ $index }}][option_d]" class="form-input w-full rounded-lg border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="D" required>
        </div>
    </div>

    <!-- Dropdown Jawaban Benar -->
    <div class="mt-5">
        <label class="block text-sm font-semibold text-gray-700 mb-1">
            <i class="fas fa-check-circle text-green-500 mr-1"></i> Jawaban Benar
        </label>
        <select name="questions[{{ $index }}][correct_answer]" class="form-select w-full rounded-lg border-gray-300 focus:ring-green-500 focus:border-green-500" required>
            <option value="" disabled selected>-- Pilih jawaban benar --</option>
            <option value="A">A</option>
            <option value="B">B</option>
            <option value="C">C</option>
            <option value="D">D</option>
        </select>
    </div>
</div>
