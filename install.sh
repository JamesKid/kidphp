#!/bin/bash
echo "===================== Kidphp Shell ==================="
echo " This is Kidphp System Script"
echo " "
echo -e "\e[33m  1. Install framework.    \e[m"
echo -e "\e[35m  2. Make page_cache moutiple country directory.  \e[m"
echo -e "\e[36m  3. Add log directory.    \e[m"
echo -e "\e[32m  4. Clean page_cache.     \e[m"
echo -e "\e[34m  5. Automation deployment.   \e[m"
echo " "
echo "======================================================"

read -p " ^_^ Please make your selection:" num
# 1. 添加多国语言缓存目录
function install(){
    echo 'install complete'
}
# 2. 添加多国语言缓存目录
function addMultiCountryDirectory(){
    mkdir system/page_cache/en
    mkdir system/page_cache/zh
    chmod -R 777 system/page_cache/en
    chmod -R 777 system/page_cache/zh
    echo "Make directory ok. ^_^" 
}
# 3. Make log file (建立日志文件夹,项目所有配置)
function addLogDicrectory(){
    mkdir -p /var/log/vimkid
    touch /var/log/vimkid/black.txt
    chmod -R 777 /var/log/vimkid/black.txt
    echo "Make log directory ok. ^_^" 
}
# 4. Clean page_cache (清除page_cache)
function deletePageCache(){
    rm -rf system/page_cache/en/*
    rm -rf system/page_cache/zh/*
    echo "Clean ok. ^_^" 
}

# 5. automation deployment (自动化部署)
function automationDeployment(){
    # git pull 
    # nginx reload
    # clean page_cache
    # clean memcache
    # database config_file control
    echo 'Automation deployment complete'
}

case $num in
    [1]) (install);;
    [2]) (addMultiCountryDirectory);;
    [3]) (addLogDicrectory);;
    [4]) (deletePageCache);;
    [5]) (automationDeployment);;
      *) echo "No this selection, exit.  ^_^" ;;
esac
