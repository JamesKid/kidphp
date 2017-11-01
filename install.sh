#!/bin/bash
read -p "
=================== Kidphp Shell ===================

1. Make page_cache moutiple country directory
2. other
3. clean page_cache

============================  ^_^  Make your select:
" var
case $var in
      # 添加多国语言缓存目录
      1)  mkdir system/page_cache/en
          mkdir system/page_cache/zh
          chmod -R 777 system/page_cache/en
          chmod -R 777 system/page_cache/zh
          echo "make directory ok" ;;

      # 建立日志文件夹,项目所有配置
      2)  mkdir -p /var/log/vimkid
          touch /var/log/vimkid/black.txt
          chmod -R 777 /var/log/vimkid/black.txt
          echo "make log directory ok" ;;

      # 清除page_cache
      3)  rm -rf system/page_cache/en/*
          rm -rf system/page_cache/zh/*
          echo "clean ok" ;;

      *) echo "Wrong" ;;
esac
