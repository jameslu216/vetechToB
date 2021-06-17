module.exports = {
    printWidth: 120, // 一行最多 120 字符

    tabWidth: 2, // 使用 2 個空格縮排

    useTabs: false, // 不使用縮排符，而使用空格

    semi: true, // 行尾需要有分號

    singleQuote: true, // 使用單引號

    quoteProps: 'as-needed', // 物件的 key 僅在必要時用引號

    jsxSingleQuote: false, // jsx 不使用單引號，而使用雙引號

    trailingComma: 'all', // 末尾需要有逗號

    bracketSpacing: true, // 大括號內的首尾需要空格

    jsxBracketSameLine: false, // jsx 標籤的反尖括號需要換行

    arrowParens: 'always', // 箭頭函數，只有一個參數的時候，也需要括號

    rangeStart: 0, // 每個檔案格式化的範圍是檔案的全部內容

    rangeEnd: Infinity,

    requirePragma: false, // 不需要寫檔案開頭的 @prettier

    insertPragma: false, // 不需要自動在檔案開頭插入 @prettier

    proseWrap: 'preserve', // 使用預設的折行標準

    htmlWhitespaceSensitivity: 'css', // 根據顯示樣式決定 html 要不要折行

    vueIndentScriptAndStyle: false, // vue 檔案中的 script 和 style 內不用縮排

    endOfLine: 'lf', // 換行符使用 lf

    embeddedLanguageFormatting: 'auto',// 格式化嵌入的內容
  };
