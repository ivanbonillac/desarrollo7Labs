FROM phpid/xampp
COPY lab1.1.php /opt/lampp/htdocs/
RUN /opt/lampp/lampp start
EXPOSE 80
EXPOSE 433
EXPOSE 21
WORKDIR /opt/lampp/htdocs
CMD ["/bin/bash"]