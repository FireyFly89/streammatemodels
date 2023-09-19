#!/bin/bash
lessc="./node_modules/less/bin/lessc";
postcss="./node_modules/postcss-cli-simple/bin/postcss";

if [[ ! -f "$lessc" ]]; then
  echo >&2 "The lessc command is required, please run: 'npm i less' first, or just 'npm i' if you have latest packages.json"; exit 1;
elif [[ ! -f "$postcss" ]]; then
  echo >&2 "The postcss command is required, please run: 'npm i postcss-cli-simple autoprefixer' first, or just 'npm i' if you have latest packages.json"; exit 1;
fi

watch_dir="wordpress-core/wp-content/themes/streamatemodels/assets/less";
less_file="$watch_dir/main.less";
css_file="wordpress-core/wp-content/themes/streamatemodels/style.css";

echo "Compiling CSS at $css_file from $less_file"
$lessc "$less_file" "$css_file"
$postcss --use autoprefixer --use cssnano -o "$css_file" "$css_file"
echo "Done!"
